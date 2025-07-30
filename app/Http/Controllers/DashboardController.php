<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('client');

        // Filter berdasarkan nama klien
        if ($request->filled('client_name')) {
            $query->whereHas('client', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->client_name . '%');
            });
        }

        // Filter berdasarkan status pembayaran
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Filter berdasarkan status paket
        if ($request->filled('package_status')) {
            $query->where('package_status', $request->package_status);
        }

        // Filter berdasarkan status kadaluarsa
        if ($request->filled('expiry_status')) {
            $now = now();
            switch ($request->expiry_status) {
                case 'expired':
                    $query->where(function ($q) use ($now) {
                        $q->where('domain_expiry', '<', $now)
                          ->orWhere('hosting_expiry', '<', $now);
                    });
                    break;
                case 'warning':
                    $query->where(function ($q) use ($now) {
                        $q->whereBetween('domain_expiry', [$now, $now->copy()->addDays(30)])
                          ->orWhereBetween('hosting_expiry', [$now, $now->copy()->addDays(30)]);
                    });
                    break;
                case 'safe':
                    $query->where(function ($q) use ($now) {
                        $q->where('domain_expiry', '>', $now->copy()->addDays(30))
                          ->orWhere('hosting_expiry', '>', $now->copy()->addDays(30));
                    });
                    break;
            }
        }

        // Pencarian global
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('website_name', 'like', '%' . $search . '%')
                  ->orWhere('url', 'like', '%' . $search . '%')
                  ->orWhere('notes', 'like', '%' . $search . '%')
                  ->orWhereHas('client', function ($clientQuery) use ($search) {
                      $clientQuery->where('name', 'like', '%' . $search . '%')
                                  ->orWhere('email', 'like', '%' . $search . '%');
                  });
            });
        }

        $projects = $query->orderBy('created_at', 'desc')->paginate(15);
        $clients = Client::all();

        // Calculate statistics for all projects (not just paginated results)
        $now = Carbon::now();
        $oneMonthFromNow = $now->copy()->addMonth();
        
        // Count domains expiring within 1 month
        $domainExpiringCount = Project::whereNotNull('domain_expiry')
            ->whereBetween('domain_expiry', [$now, $oneMonthFromNow])
            ->count();
        
        // Count hosting expiring within 1 month
        $hostingExpiringCount = Project::whereNotNull('hosting_expiry')
            ->whereBetween('hosting_expiry', [$now, $oneMonthFromNow])
            ->count();

        // Count new projects in the last 30 days
        $thirtyDaysAgo = $now->copy()->subDays(30);
        $newProjectsCount = Project::where('created_at', '>=', $thirtyDaysAgo)->count();
        
        // Count new clients in the last 30 days
        $newClientsCount = Client::where('created_at', '>=', $thirtyDaysAgo)->count();

        // Get latest 3 projects
        $latestProjects = Project::with('client')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Get latest 3 clients
        $latestClients = Client::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Calendar data - projects for selected month/year
        $calendarYear = $request->get('calendar_year', $now->year);
        $calendarMonth = $request->get('calendar_month', $now->month);
        $currentCalendarDate = Carbon::create($calendarYear, $calendarMonth, 1);
        
        $calendarProjects = Project::with('client')
            ->whereYear('created_at', $calendarYear)
            ->whereMonth('created_at', $calendarMonth)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function($project) {
                return $project->created_at->format('Y-m-d');
            });

        // Navigation dates
        $prevMonth = $currentCalendarDate->copy()->subMonth();
        $nextMonth = $currentCalendarDate->copy()->addMonth();

        // Chart data - projects per month for current year
        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthCount = Project::whereYear('created_at', $now->year)
                ->whereMonth('created_at', $i)
                ->count();
            $chartData[] = [
                'month' => Carbon::create($now->year, $i, 1)->format('M'),
                'count' => $monthCount
            ];
        }

        // Get filter parameters for chart
        $filterYear = $request->get('chart_year', $now->year);
        $filterPeriod = $request->get('chart_period', 'month'); // month, year

        // Generate chart data based on filter
        if ($filterPeriod === 'year') {
            $chartData = [];
            for ($year = $filterYear - 4; $year <= $filterYear; $year++) {
                $yearCount = Project::whereYear('created_at', $year)->count();
                $chartData[] = [
                    'period' => $year,
                    'count' => $yearCount
                ];
            }
        } else {
            // Default monthly data
            $chartData = [];
            for ($i = 1; $i <= 12; $i++) {
                $monthCount = Project::whereYear('created_at', $filterYear)
                    ->whereMonth('created_at', $i)
                    ->count();
                $chartData[] = [
                    'period' => Carbon::create($filterYear, $i, 1)->format('M'),
                    'count' => $monthCount
                ];
            }
        }

        // Handle AJAX request for chart data
        if ($request->ajax() && $request->filled('ajax_chart')) {
            return response()->json([
                'success' => true,
                'chartData' => $chartData
            ]);
        }

        // Handle AJAX request for specific date
        if ($request->ajax() && $request->filled('calendar_date')) {
            $selectedDate = $request->get('calendar_date');
            $selectedYear = $request->get('calendar_year', $now->year);
            $selectedMonth = $request->get('calendar_month', $now->month);
            
            // Create full date string
            $fullDate = sprintf('%04d-%02d-%02d', $selectedYear, $selectedMonth, $selectedDate);
            
            try {
                $dateObj = Carbon::createFromFormat('Y-m-d', $fullDate);
                
                $projectsForDate = Project::with('client')
                    ->whereDate('created_at', $dateObj)
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->map(function($project) {
                        return [
                            'id' => $project->id,
                            'name' => $project->website_name,
                            'client_name' => $project->client->name ?? null,
                            'package_name' => $project->package_name ?? null,
                            'package_status' => $project->package_status ?? null,
                            'status' => $project->status ?? 'N/A',
                            'created_at' => $project->created_at->toISOString(),
                        ];
                    });
                
                return response()->json([
                    'success' => true,
                    'projects' => $projectsForDate,
                    'date' => $dateObj->format('d M Y')
                ]);
                
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid date format',
                    'projects' => []
                ]);
            }
        }

        return view('dashboard.index', compact(
            'projects', 
            'clients', 
            'domainExpiringCount', 
            'hostingExpiringCount',
            'newProjectsCount',
            'newClientsCount',
            'latestProjects',
            'latestClients',
            'calendarProjects',
            'chartData',
            'currentCalendarDate',
            'calendarYear',
            'calendarMonth',
            'prevMonth',
            'nextMonth',
            'filterYear',
            'filterPeriod'
        ));
    }
}
