<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Project::with('client')->orderBy('created_at', 'desc');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('website_name', 'like', '%' . $search . '%')
                  ->orWhere('url', 'like', '%' . $search . '%')
                  ->orWhereHas('client', function ($clientQuery) use ($search) {
                      $clientQuery->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        $projects = $query->paginate(15);
        $clients = Client::orderBy('name')->get();

        return view('projects.index', compact('projects', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::orderBy('name')->get();
        return view('projects.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'website_name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
            'notes' => 'nullable|string',
            'domain_expiry' => 'nullable|date',
            'hosting_expiry' => 'nullable|date',
            'hosting_provider' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'payment_date' => 'nullable|date',
            'payment_status' => 'required|in:pending,paid,overdue',
            'package_status' => 'required|in:website,maintenance,seo,website_maintenance,website_seo,website_maintenance_seo',
        ]);

        $project = Project::create($validated);

        // Handle AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Proyek berhasil ditambahkan.',
                'project' => $project
            ]);
        }

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('client');
        $clients = Client::orderBy('name')->get();
        return view('projects.show', compact('project', 'clients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $clients = Client::orderBy('name')->get();
        return view('projects.edit', compact('project', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'website_name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
            'notes' => 'nullable|string',
            'domain_expiry' => 'nullable|date',
            'hosting_expiry' => 'nullable|date',
            'hosting_provider' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'payment_date' => 'nullable|date',
            'payment_status' => 'required|in:pending,paid,overdue',
            'package_status' => 'required|in:website,maintenance,seo,website_maintenance,website_seo,website_maintenance_seo',
        ]);

        $project->update($validated);

        // Handle AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Proyek berhasil diperbarui.',
                'project' => $project->load('client')
            ]);
        }

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    /**
     * Fetch project data for AJAX requests.
     */
    public function fetch(Project $project)
    {
        try {
            // Load the client relationship
            $project->load('client');
            
            return response()->json([
                'success' => true,
                'project' => [
                    'id' => $project->id,
                    'client_id' => $project->client_id,
                    'website_name' => $project->website_name,
                    'url' => $project->url,
                    'status' => $project->status,
                    'domain_expiry' => $project->domain_expiry,
                    'hosting_expiry' => $project->hosting_expiry,
                    'hosting_provider' => $project->hosting_provider,
                    'price' => $project->price,
                    'payment_date' => $project->payment_date,
                    'payment_status' => $project->payment_status,
                    'package_status' => $project->package_status,
                    'notes' => $project->notes,
                    'client' => $project->client ? [
                        'id' => $project->client->id,
                        'name' => $project->client->name
                    ] : null
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data proyek: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Project $project)
    {
        try {
            $project->delete();

            // Handle AJAX request
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Proyek berhasil dihapus.'
                ]);
            }

            return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus.');
        } catch (\Exception $e) {
            // Handle AJAX request
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus proyek: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->route('projects.index')->with('error', 'Gagal menghapus proyek: ' . $e->getMessage());
        }
    }
}
