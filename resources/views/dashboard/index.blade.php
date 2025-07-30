@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="w-full">
    <!-- Modern Header Section -->
    <div class="relative mb-8 overflow-hidden rounded-2xl">
        <!-- Background with gradient and animated elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/20 via-transparent to-cyan-400/20"></div>
        
        <!-- Animated background shapes - contained within bounds -->
        <div class="absolute top-4 left-4 w-32 h-32 bg-white/10 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-4 right-4 w-32 h-32 bg-yellow-300/10 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-4 left-8 w-32 h-32 bg-pink-300/10 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        
        <!-- Content -->
        <div class="relative px-6 py-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <!-- Left side - Text content -->
                <div class="flex-1 mb-6 lg:mb-0">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold text-white mb-1 tracking-tight">
                                Dashboard
                                <span class="inline-block w-2.5 h-2.5 bg-yellow-400 rounded-full ml-2 animate-pulse"></span>
                            </h1>
                            <p class="text-lg text-white/90 font-medium">Ringkasan proyek dan status client</p>
                        </div>
                    </div>
                    

                </div>
                
                <!-- Right side - Decorative elements -->
                <div class="hidden lg:flex flex-shrink-0 ml-6">
                    <div class="relative w-40 h-24">
                        <!-- Floating cards animation -->
                        <div class="absolute inset-0">
                            <div class="absolute top-0 right-0 w-32 h-20 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 transform rotate-3 animate-float"></div>
                            <div class="absolute top-1 right-1 w-32 h-20 bg-white/15 backdrop-blur-sm rounded-xl border border-white/30 transform -rotate-2 animate-float-delayed"></div>
                            <div class="absolute top-2 right-2 w-32 h-20 bg-white/20 backdrop-blur-sm rounded-xl border border-white/40 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-6 h-6 bg-white/30 rounded-lg mx-auto mb-1 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-white/90 text-xs font-medium">Analytics</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom decorative line -->
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-white/30 to-transparent"></div>
        </div>
    </div>

    <!-- Custom CSS for animations -->
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(15px, -20px) scale(1.05); }
            66% { transform: translate(-10px, 10px) scale(0.95); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(3deg); }
            50% { transform: translateY(-8px) rotate(3deg); }
        }
        
        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px) rotate(-2deg); }
            50% { transform: translateY(-12px) rotate(-2deg); }
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .animate-float-delayed {
            animation: float-delayed 3s ease-in-out infinite;
            animation-delay: 1s;
        }
    </style>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="group bg-white/90 backdrop-blur-md border border-gray-200 shadow-lg rounded-2xl transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer">
            <div class="p-6 flex items-center gap-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-blue-500/90 rounded-xl flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <dl>
                        <dt class="text-base font-semibold text-gray-600">Total Client</dt>
                        <dd class="text-2xl font-bold text-gray-900 mt-1">{{ $clients->count() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="group bg-white/90 backdrop-blur-md border border-gray-200 shadow-lg rounded-2xl transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer">
            <div class="p-6 flex items-center gap-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-green-500/90 rounded-xl flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <dl>
                        <dt class="text-base font-semibold text-gray-600">Total Proyek</dt>
                        <dd class="text-2xl font-bold text-gray-900 mt-1">{{ $projects->total() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="group bg-white/90 backdrop-blur-md border border-gray-200 shadow-lg rounded-2xl transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer">
            <div class="p-6 flex items-center gap-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-yellow-500/90 rounded-xl flex items-center justify-center shadow-md">
                        <!-- Globe icon for Domain -->
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke-width="2"/>
                            <path stroke-width="2" d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <dl>
                        <dt class="text-base font-semibold text-gray-600">Domain Akan Kadaluarsa</dt>
                        <dd class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $domainExpiringCount }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="group bg-white/90 backdrop-blur-md border border-gray-200 shadow-lg rounded-2xl transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer">
            <div class="p-6 flex items-center gap-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-red-500/90 rounded-xl flex items-center justify-center shadow-md">
                        <!-- Server icon for Hosting -->
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="6" rx="2" stroke-width="2"/>
                            <rect x="3" y="14" width="18" height="6" rx="2" stroke-width="2"/>
                            <path stroke-width="2" d="M3 10h18M7 20v-2M7 10V8"/>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <dl>
                        <dt class="text-base font-semibold text-gray-600">Hosting Akan Kadaluarsa</dt>
                        <dd class="text-2xl font-bold text-gray-900 mt-1">
                            {{ $hostingExpiringCount }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- New Cards Section - 50% 50% Layout -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Proyek Terbaru Card -->
        <div class="bg-white border border-gray-200 shadow-lg rounded-2xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Proyek Terbaru</h3>
                            <p class="text-sm text-gray-600">30 hari terakhir</p>
                        </div>
                    </div>
                    <div class="text-right">
                            <!-- Mini Chart SVG -->
                            <div class="w-20 h-12 relative">
                                <svg class="w-full h-full" viewBox="0 0 80 48" fill="none">
                                    <!-- Background grid -->
                                    <defs>
                                        <linearGradient id="projectGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                            <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:0.8"/>
                                            <stop offset="100%" style="stop-color:#06B6D4;stop-opacity:0.2"/>
                                        </linearGradient>
                                    </defs>
                                    <!-- Chart line -->
                                    <path d="M5 35 L15 28 L25 32 L35 20 L45 25 L55 18 L65 22 L75 15" 
                                          stroke="url(#projectGradient)" stroke-width="2" fill="none"/>
                                    <!-- Chart area -->
                                    <path d="M5 35 L15 28 L25 32 L35 20 L45 25 L55 18 L65 22 L75 15 L75 40 L5 40 Z" 
                                          fill="url(#projectGradient)"/>
                                    <!-- Data points -->
                                    <circle cx="15" cy="28" r="2" fill="#3B82F6"/>
                                    <circle cx="35" cy="20" r="2" fill="#3B82F6"/>
                                    <circle cx="55" cy="18" r="2" fill="#3B82F6"/>
                                    <circle cx="75" cy="15" r="2" fill="#3B82F6"/>
                                </svg>
                            </div>
                        </div>
                </div>

                
                <!-- Latest Projects List -->
                @if($latestProjects->count() > 0)
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Proyek Terbaru:</h4>
                    <div class="space-y-2">
                        @foreach($latestProjects as $project)
                        <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $project->website_name }}</p>
                                <p class="text-xs text-gray-500">{{ $project->client->name ?? 'N/A' }}</p>
                            </div>
                            <div class="text-xs text-gray-400">
                                {{ $project->created_at->diffForHumans() }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Client Baru Card -->
        <div class="bg-white border border-gray-200 shadow-lg rounded-2xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Client Terbaru</h3>
                            <p class="text-sm text-gray-600">30 hari terakhir</p>
                        </div>
                    </div>
                    <div class="text-right">
                            <!-- Mini Bar Chart SVG -->
                            <div class="w-20 h-12 relative">
                                <svg class="w-full h-full" viewBox="0 0 80 48" fill="none">
                                    <defs>
                                        <linearGradient id="clientGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                            <stop offset="0%" style="stop-color:#10B981;stop-opacity:0.8"/>
                                            <stop offset="100%" style="stop-color:#059669;stop-opacity:0.3"/>
                                        </linearGradient>
                                    </defs>
                                    <!-- Bar chart -->
                                    <rect x="8" y="25" width="6" height="15" fill="url(#clientGradient)" rx="1"/>
                                    <rect x="18" y="20" width="6" height="20" fill="url(#clientGradient)" rx="1"/>
                                    <rect x="28" y="30" width="6" height="10" fill="url(#clientGradient)" rx="1"/>
                                    <rect x="38" y="15" width="6" height="25" fill="url(#clientGradient)" rx="1"/>
                                    <rect x="48" y="22" width="6" height="18" fill="url(#clientGradient)" rx="1"/>
                                    <rect x="58" y="12" width="6" height="28" fill="url(#clientGradient)" rx="1"/>
                                    <rect x="68" y="18" width="6" height="22" fill="url(#clientGradient)" rx="1"/>
                                    
                                    <!-- Highlight dots on top of bars -->
                                    <circle cx="11" cy="23" r="1.5" fill="#10B981"/>
                                    <circle cx="21" cy="18" r="1.5" fill="#10B981"/>
                                    <circle cx="41" cy="13" r="1.5" fill="#10B981"/>
                                    <circle cx="61" cy="10" r="1.5" fill="#10B981"/>
                                </svg>
                            </div>
                        </div>
                </div>

                
                <!-- Latest Clients List -->
                @if($latestClients->count() > 0)
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Client Terbaru:</h4>
                    <div class="space-y-2">
                        @foreach($latestClients as $client)
                        <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $client->name }}</p>
                                <p class="text-xs text-gray-500">{{ $client->email }}</p>
                            </div>
                            <div class="text-xs text-gray-400">
                                {{ $client->created_at->diffForHumans() }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Calendar Card with 50-50 Layout -->
    <div class="bg-white border border-gray-200 shadow-lg rounded-2xl overflow-hidden mb-8">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Kalender Proyek</h3>
                        <p class="text-sm text-gray-600">{{ $currentCalendarDate->format('F Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- 50-50 Layout: Calendar Left, Projects Right -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Side: Calendar -->
                <div class="calendar-section">
                    <!-- Calendar Navigation and Filter -->
                    <div id="calendar-section" class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <!-- Navigation Arrows -->
                            <div class="flex items-center gap-2">
                                <button id="prev-month-btn" 
                                        data-year="{{ $prevMonth->year }}" 
                                        data-month="{{ $prevMonth->month }}"
                                        class="calendar-nav-btn p-2 rounded-lg bg-purple-100 hover:bg-purple-200 text-purple-600 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                
                                <div class="text-lg font-bold text-gray-900 min-w-32 text-center" id="calendar-header">
                                    {{ $currentCalendarDate->format('F Y') }}
                                </div>
                                
                                <button id="next-month-btn" 
                                        data-year="{{ $nextMonth->year }}" 
                                        data-month="{{ $nextMonth->month }}"
                                        class="calendar-nav-btn p-2 rounded-lg bg-purple-100 hover:bg-purple-200 text-purple-600 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Quick Filter - Moved to right side -->
                            <div class="flex items-center gap-2">
                                <!-- Reset Button -->
                                <button id="reset-calendar-btn" 
                                        class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 hover:text-gray-800 transition-colors duration-200 border border-gray-300"
                                        title="Reset ke tampilan default">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                </button>
                                
                                <select id="calendar-year-filter" class="text-sm border border-gray-300 rounded-lg px-3 py-1 focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                                    @for($year = 2020; $year <= \Carbon\Carbon::now()->year + 1; $year++)
                                        <option value="{{ $year }}" {{ $calendarYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                                
                                <select id="calendar-month-filter" class="text-sm border border-gray-300 rounded-lg px-3 py-1 focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                                    @for($month = 1; $month <= 12; $month++)
                                        <option value="{{ $month }}" {{ $calendarMonth == $month ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::create(null, $month, 1)->format('M') }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Calendar Grid -->
                    <div class="bg-gray-50 rounded-xl p-4" id="calendar-grid">
                        <!-- Calendar Header -->
                        <div class="grid grid-cols-7 gap-1 mb-2">
                            @foreach(['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $day)
                            <div class="text-center text-xs font-semibold text-gray-600 py-2">{{ $day }}</div>
                            @endforeach
                        </div>

                        <!-- Calendar Days -->
                        <div class="grid grid-cols-7 gap-1">
                            @php
                                $now = \Carbon\Carbon::now();
                                $selectedDate = $currentCalendarDate->copy(); // Use selected calendar date
                                $startOfMonth = $selectedDate->copy()->startOfMonth();
                                $endOfMonth = $selectedDate->copy()->endOfMonth();
                                $startDate = $startOfMonth->copy()->startOfWeek();
                                $endDate = $endOfMonth->copy()->endOfWeek();
                                $currentDate = $startDate->copy();
                            @endphp

                            @while($currentDate <= $endDate)
                                @php
                                    $dateString = $currentDate->format('Y-m-d');
                                    $isCurrentMonth = $currentDate->month === $selectedDate->month && $currentDate->year === $selectedDate->year;
                                    $isToday = $currentDate->isToday();
                                    $hasProjects = isset($calendarProjects[$dateString]);
                                    $projectCount = $hasProjects ? $calendarProjects[$dateString]->count() : 0;
                                @endphp
                                
                                <div class="calendar-date relative h-10 flex items-center justify-center text-sm rounded-lg transition-all duration-200 hover:bg-purple-600 hover:text-white hover:shadow-sm cursor-pointer
                                    {{ $isCurrentMonth ? 'text-gray-900' : 'text-gray-400' }}
                                    {{ $isToday ? 'bg-purple-600 text-white font-bold shadow-md hover:bg-purple-600 hover:text-white' : '' }}
                                    {{ $hasProjects && !$isToday ? 'bg-purple-100 text-purple-700 font-medium hover:bg-purple-600 hover:text-white' : '' }}"
                                    data-date="{{ $currentDate->day }}"
                                    data-year="{{ $currentDate->year }}"
                                    data-month="{{ $currentDate->month }}"
                                    data-full-date="{{ $dateString }}">
                                    {{ $currentDate->day }}
                                    
                                    @if($hasProjects)
                                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-orange-500 text-white text-xs rounded-full flex items-center justify-center font-bold">
                                            {{ $projectCount }}
                                        </div>
                                    @endif
                                </div>
                                @php $currentDate->addDay(); @endphp
                            @endwhile
                        </div>
                    </div>
                </div>

                <!-- Right Side: Project Listing -->
                <div class="projects-section">
                    <div class="bg-gray-50 rounded-xl p-4 h-full">
                        <h4 class="text-sm font-semibold text-gray-700 mb-4">Detail Proyek</h4>
                        
                        <!-- Default Project Notes for Selected Month -->
                        @php
                            // Show projects for today if viewing current month, otherwise show all projects for selected month
                            $isCurrentMonth = $currentCalendarDate->year == \Carbon\Carbon::now()->year && 
                                             $currentCalendarDate->month == \Carbon\Carbon::now()->month;
                            
                            if ($isCurrentMonth) {
                                $displayProjects = $calendarProjects[\Carbon\Carbon::now()->format('Y-m-d')] ?? collect();
                                $notesTitle = 'Proyek Hari Ini:';
                            } else {
                                $displayProjects = $calendarProjects->flatten();
                                $notesTitle = 'Proyek ' . $currentCalendarDate->format('F Y') . ':';
                            }
                        @endphp
                        
                        <div id="project-notes">
                        @if($displayProjects->count() > 0)
                        <div class="mb-4">
                            <h5 class="text-xs font-medium text-gray-600 mb-3">{{ $notesTitle }}</h5>
                            <div class="space-y-2 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-purple-300 scrollbar-track-gray-100 hover:scrollbar-thumb-purple-400">
                                @foreach($displayProjects->take(10) as $project)
                                <div class="flex items-center gap-3 p-3 bg-white rounded-lg border border-purple-100 shadow-sm">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $project->website_name }}</p>
                                        <div class="flex items-center gap-2 mt-1">
                                            <p class="text-xs text-gray-500">{{ $project->client->name ?? 'N/A' }}</p>
                                            <span class="text-xs text-gray-400">•</span>
                                            @if($project->package_status)
                                            @php
                                                $packageColors = [
                                                    'website' => 'bg-blue-100 text-blue-800 border-blue-300',
                                                    'maintenance' => 'bg-green-100 text-green-800 border-green-300',
                                                    'seo' => 'bg-violet-100 text-violet-800 border-violet-300',
                                                    'website_maintenance' => 'bg-purple-100 text-purple-800 border-purple-300',
                                                    'website_seo' => 'bg-pink-100 text-pink-800 border-pink-300',
                                                    'website_maintenance_seo' => 'bg-amber-100 text-amber-800 border-amber-300'
                                                ];
                                                $colorClass = $packageColors[$project->package_status] ?? 'bg-blue-100 text-blue-800 border-blue-300';
                                            @endphp
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium border {{ $colorClass }}">
                                                {{ $project->package_status_label }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ml-2">
                                        <a href="/projects/{{ $project->id }}" class="text-purple-600 hover:text-purple-800 text-xs font-medium">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                
                                @if($displayProjects->count() > 10)
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">+{{ $displayProjects->count() - 10 }} proyek lainnya</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-sm text-gray-500">{{ $notesTitle }}</p>
                            <p class="text-xs text-gray-400 mt-1">Tidak ada proyek untuk periode ini</p>
                        </div>
                        @endif
                        </div>
                        
                        <!-- Selected Date Projects -->
                        <div id="projects-list">
                            <!-- Projects for selected date will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Card - Full Width -->
     <div class="bg-white border border-gray-200 shadow-lg rounded-2xl overflow-hidden mb-8">
         <div class="p-6">
             <div class="flex items-center justify-between mb-6">
                 <div class="flex items-center gap-3">
                     <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg">
                         <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                         </svg>
                     </div>
                     <div>
                         <h3 class="text-lg font-bold text-gray-900">Perkembangan Proyek</h3>
                         <p class="text-sm text-gray-600">Analisis pertumbuhan</p>
                     </div>
                 </div>
             </div>

                <!-- Filter Controls -->
                <div class="mb-6">
                    <div class="flex flex-wrap gap-3">
                        <select id="chart-period-filter" name="chart_period" class="text-sm border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="month" {{ $filterPeriod === 'month' ? 'selected' : '' }}>Bulanan</option>
                            <option value="year" {{ $filterPeriod === 'year' ? 'selected' : '' }}>Tahunan</option>
                        </select>
                        
                        <select id="chart-year-filter" name="chart_year" class="text-sm border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            @for($year = 2020; $year <= \Carbon\Carbon::now()->year + 1; $year++)
                                <option value="{{ $year }}" {{ $filterYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                        
                        <!-- Loading indicator -->
                        <div id="chart-loading" class="hidden text-sm text-orange-600 px-3 py-2 flex items-center">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memuat...
                        </div>
                    </div>
                </div>

                <!-- Chart Area -->
                <div class="relative bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100 shadow-sm chart-container">
                    <div class="h-72 relative">
                        <canvas id="projectChart" width="400" height="200" class="drop-shadow-sm"></canvas>
                    </div>
                    
                    <!-- Chart overlay for modern effect -->
                    <div class="absolute inset-0 bg-gradient-to-t from-white/20 to-transparent rounded-2xl pointer-events-none"></div>
                </div>

                <!-- Chart Summary -->
                <div class="mt-6 chart-summary">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div class="stat-item">
                            <div class="text-xl font-bold text-gray-900">{{ collect($chartData)->sum('count') }}</div>
                            <div class="text-xs text-gray-600 mt-1">Total Proyek</div>
                        </div>
                        <div class="stat-item">
                            <div class="text-xl font-bold text-blue-600">{{ collect($chartData)->max('count') }}</div>
                            <div class="text-xs text-gray-600 mt-1">Puncak</div>
                        </div>
                        <div class="stat-item">
                            <div class="text-xl font-bold text-green-600">{{ number_format((float) collect($chartData)->avg('count') ?: 0, 1) }}</div>
                            <div class="text-xs text-gray-600 mt-1">Rata-rata</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<style>
html {
    scroll-behavior: smooth;
}

#calendar-section {
    scroll-margin-top: 20px;
}

#calendar-grid {
    transition: all 0.3s ease;
}

#calendar-header {
    transition: all 0.2s ease;
}

#project-notes {
    transition: all 0.3s ease;
}

.calendar-loading {
    opacity: 0.5;
    pointer-events: none;
}

/* Modern Chart Styling */
#projectChart {
    border-radius: 16px;
    transition: all 0.3s ease;
}

#projectChart:hover {
    transform: translateY(-2px);
    filter: drop-shadow(0 8px 25px rgba(59, 130, 246, 0.15));
}

/* Chart container animations */
.chart-container {
    position: relative;
    overflow: hidden;
}

.chart-container::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(59, 130, 246, 0.05), transparent);
    transform: rotate(45deg);
    animation: shimmer 3s infinite;
    pointer-events: none;
}

@keyframes shimmer {
    0% {
        transform: translateX(-100%) translateY(-100%) rotate(45deg);
    }
    100% {
        transform: translateX(100%) translateY(100%) rotate(45deg);
    }
}

/* Filter controls modern styling */
#chart-period-filter,
#chart-year-filter {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border: 1px solid #e2e8f0;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease;
}

#chart-period-filter:hover,
#chart-year-filter:hover {
    border-color: #3b82f6;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
    transform: translateY(-1px);
}

#chart-period-filter:focus,
#chart-year-filter:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    outline: none;
}

/* Loading indicator modern styling */
#chart-loading {
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    border: 1px solid #93c5fd;
    border-radius: 8px;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.8;
    }
}

/* Chart summary modern styling */
.chart-summary {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 16px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.chart-summary .stat-item {
    transition: all 0.2s ease;
}

.chart-summary .stat-item:hover {
    transform: translateY(-2px);
}

/* Custom scrollbar for project notes */
#project-notes .space-y-2::-webkit-scrollbar {
    width: 6px;
}

#project-notes .space-y-2::-webkit-scrollbar-track {
    background: #f3f4f6;
    border-radius: 3px;
}

#project-notes .space-y-2::-webkit-scrollbar-thumb {
    background: #d1d5db;
    border-radius: 3px;
}

#project-notes .space-y-2::-webkit-scrollbar-thumb:hover {
    background: #9ca3af;
}

/* Firefox scrollbar */
#project-notes .space-y-2 {
    scrollbar-width: thin;
    scrollbar-color: #d1d5db #f3f4f6;
}

/* Responsive chart styling */
@media (max-width: 768px) {
    #projectChart {
        height: 250px !important;
    }
    
    .chart-container::before {
        display: none;
    }
}
</style>

<script>
// Global variables
let isNavigating = false;
let navigationTimeout = null;
let isChartLoading = false;
let currentChart = null;

// Function to update chart with new data
function updateChart(newData) {
    if (currentChart) {
        // Prepare new chart data
        var labels = newData.map(function(item) { return item.period; });
        var data = newData.map(function(item) { return item.count; });
        
        // Update chart data
        currentChart.data.labels = labels;
        currentChart.data.datasets[0].data = data;
        
        // Update chart
        currentChart.update('active');
        
        console.log('Chart updated with new data');
    }
}

// Function to load chart data via AJAX
function loadChartData(period, year) {
    if (isChartLoading) {
        console.log('Chart loading already in progress');
        return;
    }
    
    isChartLoading = true;
    
    // Show loading indicator
    const loadingIndicator = document.getElementById('chart-loading');
    if (loadingIndicator) {
        loadingIndicator.classList.remove('hidden');
    }
    
    // Disable filter controls
    const periodFilter = document.getElementById('chart-period-filter');
    const yearFilter = document.getElementById('chart-year-filter');
    if (periodFilter) periodFilter.disabled = true;
    if (yearFilter) yearFilter.disabled = true;
    
    // Build URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('chart_period', period);
    urlParams.set('chart_year', year);
    urlParams.set('ajax_chart', '1'); // Flag for AJAX request
    
    // Make AJAX request
    fetch(window.location.pathname + '?' + urlParams.toString(), {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('HTTP ' + response.status + ': ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        if (data.chartData) {
            updateChart(data.chartData);
            
            // Update chart summary
            updateChartSummary(data.chartData);
            
            console.log('Chart data loaded successfully');
        } else {
            throw new Error('Invalid response format');
        }
    })
    .catch(error => {
        console.error('Error loading chart data:', error);
        
        // Show error message (optional)
        // You can add a toast notification here if needed
    })
    .finally(() => {
        isChartLoading = false;
        
        // Hide loading indicator
        if (loadingIndicator) {
            loadingIndicator.classList.add('hidden');
        }
        
        // Re-enable filter controls
        if (periodFilter) periodFilter.disabled = false;
        if (yearFilter) yearFilter.disabled = false;
    });
}

// Function to update chart summary
function updateChartSummary(chartData) {
    const summaryContainer = document.querySelector('.grid.grid-cols-3.gap-4.text-center');
    if (summaryContainer && chartData) {
        const total = chartData.reduce((sum, item) => sum + item.count, 0);
        const max = Math.max(...chartData.map(item => item.count));
        const avg = chartData.length > 0 ? (total / chartData.length).toFixed(1) : 0;
        
        const summaryItems = summaryContainer.querySelectorAll('.text-lg.font-bold');
        if (summaryItems.length >= 3) {
            summaryItems[0].textContent = total;
            summaryItems[1].textContent = max;
            summaryItems[2].textContent = avg;
        }
    }
}

// Initialize chart filter event listeners
function initializeChartFilters() {
    const periodFilter = document.getElementById('chart-period-filter');
    const yearFilter = document.getElementById('chart-year-filter');
    
    if (periodFilter) {
        periodFilter.addEventListener('change', function() {
            const selectedPeriod = this.value;
            const selectedYear = yearFilter ? yearFilter.value : new Date().getFullYear();
            
            console.log('Period filter changed to:', selectedPeriod);
            loadChartData(selectedPeriod, selectedYear);
        });
    }
    
    if (yearFilter) {
        yearFilter.addEventListener('change', function() {
            const selectedYear = this.value;
            const selectedPeriod = periodFilter ? periodFilter.value : 'month';
            
            console.log('Year filter changed to:', selectedYear);
            loadChartData(selectedPeriod, selectedYear);
        });
    }
    
    console.log('Chart filters initialized');
}

// Main navigation function
function navigateCalendar(year, month) {
    // Prevent multiple simultaneous requests
    if (isNavigating) {
        console.log('Navigation already in progress, ignoring request');
        return false;
    }
    
    // Clear any existing timeout
    if (navigationTimeout) {
        clearTimeout(navigationTimeout);
    }
    
    isNavigating = true;
    console.log('Starting navigation to ' + year + '-' + month);
    
    // Track navigation time to distinguish from page reload
    sessionStorage.setItem('lastCalendarNavigation', Date.now().toString());
    
    // Get elements
    const navigationButtons = document.querySelectorAll('.calendar-nav-btn');
    const calendarGrid = document.querySelector('#calendar-grid');
    const calendarHeader = document.querySelector('#calendar-header');
    const projectNotes = document.querySelector('#project-notes');
    
    // Disable all navigation buttons
    navigationButtons.forEach(btn => {
        btn.disabled = true;
        btn.style.opacity = '0.5';
        btn.style.cursor = 'wait';
        btn.style.pointerEvents = 'none';
    });
    
    // Add loading state
    if (calendarGrid) {
        calendarGrid.classList.add('calendar-loading');
    }
    
    // Build URL with cache busting
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('calendar_year', year);
    urlParams.set('calendar_month', month);
    urlParams.set('_t', Date.now()); // Cache busting
    
    // Create abort controller with timeout
    const controller = new AbortController();
    const timeoutId = setTimeout(() => {
        controller.abort();
        console.error('Request timeout after 8 seconds');
    }, 8000);
    
    // Make AJAX request
    fetch(window.location.pathname + '?' + urlParams.toString(), {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'text/html',
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
        },
        signal: controller.signal
    })
    .then(response => {
        clearTimeout(timeoutId);
        
        if (!response.ok) {
            throw new Error('HTTP ' + response.status + ': ' + response.statusText);
        }
        
        return response.text();
    })
    .then(html => {
        console.log('Successfully received response for ' + year + '-' + month);
        
        // Parse response
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        
        // Update calendar header
        const newCalendarHeader = doc.querySelector('#calendar-header');
        if (newCalendarHeader && calendarHeader) {
            calendarHeader.innerHTML = newCalendarHeader.innerHTML;
            console.log('Calendar header updated');
        }
        
        // Update calendar grid
        const newCalendarGrid = doc.querySelector('#calendar-grid');
        if (newCalendarGrid && calendarGrid) {
            calendarGrid.innerHTML = newCalendarGrid.innerHTML;
            console.log('Calendar grid updated');
        }
        
        // Update project notes
        const newProjectNotes = doc.querySelector('#project-notes');
        if (newProjectNotes && projectNotes) {
            projectNotes.innerHTML = newProjectNotes.innerHTML;
            console.log('Project notes updated');
        } else if (projectNotes) {
            projectNotes.innerHTML = '';
            console.log('Project notes cleared');
        }
        
        // Update navigation buttons with new data
        const newPrevBtn = doc.querySelector('#prev-month-btn');
        const newNextBtn = doc.querySelector('#next-month-btn');
        const currentPrevBtn = document.querySelector('#prev-month-btn');
        const currentNextBtn = document.querySelector('#next-month-btn');
        
        if (newPrevBtn && currentPrevBtn) {
            currentPrevBtn.setAttribute('data-year', newPrevBtn.getAttribute('data-year'));
            currentPrevBtn.setAttribute('data-month', newPrevBtn.getAttribute('data-month'));
        }
        
        if (newNextBtn && currentNextBtn) {
            currentNextBtn.setAttribute('data-year', newNextBtn.getAttribute('data-year'));
            currentNextBtn.setAttribute('data-month', newNextBtn.getAttribute('data-month'));
        }
        
        // Update dropdown filter values
        const yearFilter = document.getElementById('calendar-year-filter');
        const monthFilter = document.getElementById('calendar-month-filter');
        
        if (yearFilter) {
            yearFilter.value = year;
        }
        
        if (monthFilter) {
            monthFilter.value = month;
        }
        
        // Update URL without reload
        const cleanParams = new URLSearchParams(window.location.search);
        cleanParams.set('calendar_year', year);
        cleanParams.set('calendar_month', month);
        cleanParams.delete('_t'); // Remove cache busting parameter
        
        window.history.pushState({}, '', window.location.pathname + '?' + cleanParams.toString());
        
        // Add smooth transition
        if (calendarGrid) {
            calendarGrid.style.transform = 'scale(0.98)';
            setTimeout(() => {
                calendarGrid.style.transform = 'scale(1)';
            }, 150);
        }
        
        // Re-initialize calendar date clicks after content update
        initializeCalendarDateClicks();
        
        console.log('Navigation to ' + year + '-' + month + ' completed successfully');
    })
    .catch(error => {
        clearTimeout(timeoutId);
        
        if (error.name === 'AbortError') {
            console.error('Navigation request was aborted (timeout)');
        } else {
            console.error('Navigation error:', error);
        }
        
        // Fallback to full page reload
        const fallbackParams = new URLSearchParams(window.location.search);
        fallbackParams.set('calendar_year', year);
        fallbackParams.set('calendar_month', month);
        fallbackParams.delete('_t');
        
        console.log('Falling back to full page reload');
        window.location.href = window.location.pathname + '?' + fallbackParams.toString();
    })
    .finally(() => {
        // Reset state with delay to prevent rapid clicking
        navigationTimeout = setTimeout(() => {
            navigationButtons.forEach(btn => {
                btn.disabled = false;
                btn.style.opacity = '1';
                btn.style.cursor = 'pointer';
                btn.style.pointerEvents = 'auto';
            });
            
            if (calendarGrid) {
                calendarGrid.classList.remove('calendar-loading');
            }
            
            isNavigating = false;
            console.log('Navigation state reset');
        }, 300);
    });
    
    return false; // Prevent any default behavior
}

// Function to load projects for a specific date
function loadProjectsForDate(date, year, month) {
    console.log('Loading projects for date:', date, year, month);
    
    // Show loading state
    const projectsList = document.getElementById('projects-list');
    if (projectsList) {
        projectsList.innerHTML = '<div class="text-center py-4"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-purple-600 mx-auto"></div><p class="mt-2 text-gray-600">Memuat proyek...</p></div>';
    }
    
    // Make AJAX request to get projects for the specific date
    const params = new URLSearchParams();
    params.set('calendar_date', date);
    params.set('calendar_year', year);
    params.set('calendar_month', month);
    params.set('ajax', '1');
    
    fetch(window.location.pathname + '?' + params.toString(), {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success && data.projects) {
            displayProjectsForDate(data.projects, date);
        } else {
            displayNoProjects(date);
        }
    })
    .catch(error => {
        console.error('Error loading projects:', error);
        displayNoProjects(date);
    });
}

// Function to display projects for a specific date
function displayProjectsForDate(projects, date) {
    const projectsList = document.getElementById('projects-list');
    const projectNotes = document.getElementById('project-notes');
    
    if (!projectsList) return;
    
    // Hide default project notes and show projects list
    if (projectNotes) {
        projectNotes.style.display = 'none';
    }
    projectsList.style.display = 'block';
    
    if (projects.length === 0) {
        displayNoProjects(date);
        return;
    }
    
    let html = `<div class="mb-4">
        <h5 class="text-xs font-medium text-gray-600 mb-3">Proyek pada tanggal ${date}:</h5>
        <div class="space-y-2 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-purple-300 scrollbar-track-gray-100 hover:scrollbar-thumb-purple-400">
    `;
    
    projects.forEach(project => {
        const packageStatus = formatPackageStatus(project.package_status) || 'Belum Ditentukan';
        html += `
        <div class="flex items-center gap-3 p-3 bg-white rounded-lg border border-purple-100 shadow-sm">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-900 truncate">${project.name}</p>
                <div class="flex items-center gap-2 mt-1">
                    <p class="text-xs text-gray-500">${project.client_name || 'N/A'}</p>
                    <span class="text-xs text-gray-400">•</span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium border ${getPackageStatusClass(project.package_status)}">
                        ${packageStatus}
                    </span>
                </div>
            </div>
            <div class="ml-2">
                <a href="/projects/${project.id}" class="text-purple-600 hover:text-purple-800 text-xs font-medium">
                    Detail
                </a>
            </div>
        </div>`;
    });
    
    html += `
        </div>
    </div>`;
    
    projectsList.innerHTML = html;
}

// Function to display no projects message
function displayNoProjects(date) {
    const projectsList = document.getElementById('projects-list');
    const projectNotes = document.getElementById('project-notes');
    
    if (!projectsList) return;
    
    // Hide default project notes and show projects list
    if (projectNotes) {
        projectNotes.style.display = 'none';
    }
    projectsList.style.display = 'block';
    
    projectsList.innerHTML = `
    <div class="mb-4">
        <h5 class="text-xs font-medium text-gray-600 mb-3">Proyek pada tanggal ${date}:</h5>
        <div class="text-center py-8">
            <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            <p class="text-sm text-gray-500">Tidak ada proyek untuk periode ini</p>
            <p class="text-xs text-gray-400 mt-1">Tidak ada proyek pada tanggal ${date}</p>
        </div>
    </div>`;
}

// Helper function to get status badge class
function getStatusBadgeClass(status) {
    switch(status?.toLowerCase()) {
        case 'completed':
        case 'selesai':
            return 'bg-green-100 text-green-800';
        case 'in_progress':
        case 'progress':
        case 'berlangsung':
            return 'bg-blue-100 text-blue-800';
        case 'pending':
        case 'menunggu':
            return 'bg-yellow-100 text-yellow-800';
        case 'cancelled':
        case 'dibatalkan':
            return 'bg-red-100 text-red-800';
        default:
            return 'bg-gray-100 text-gray-800';
    }
}

// Helper function to get package status badge class
function getPackageStatusClass(status) {
    if (!status || status === null || status === undefined) {
        return 'bg-gray-100 text-gray-800 border border-gray-300';
    }
    
    const statusStr = String(status).toLowerCase();
    
    switch(statusStr) {
        case 'website':
            return 'bg-blue-100 text-blue-800 border border-blue-300';
        case 'maintenance':
            return 'bg-green-100 text-green-800 border border-green-300';
        case 'seo':
            return 'bg-violet-100 text-violet-800 border border-violet-300';
        case 'website_maintenance':
            return 'bg-purple-100 text-purple-800 border border-purple-300';
        case 'website_seo':
            return 'bg-pink-100 text-pink-800 border border-pink-300';
        case 'website_maintenance_seo':
            return 'bg-amber-100 text-amber-800 border border-amber-300';
        default:
            return 'bg-blue-100 text-blue-800 border border-blue-300';
    }
}

// Helper function to format package status
function formatPackageStatus(status) {
    if (!status || status === null || status === undefined) {
        return null; // Return null so we can use fallback in the calling function
    }
    
    // Convert to string and handle different formats
    const statusStr = String(status).toLowerCase();
    
    switch(statusStr) {
        case 'completed':
            return 'Selesai';
        case 'in_progress':
            return 'Dalam Proses';
        case 'pending':
            return 'Menunggu';
        case 'cancelled':
            return 'Dibatalkan';
        default:
            // Capitalize first letter and replace underscores with spaces
            return status.charAt(0).toUpperCase() + status.slice(1).replace(/_/g, ' ');
    }
}

// Function to initialize calendar date clicks
function initializeCalendarDateClicks() {
    // Remove existing listeners
    const existingDates = document.querySelectorAll('.calendar-date');
    existingDates.forEach(date => {
        const newDate = date.cloneNode(true);
        date.parentNode.replaceChild(newDate, date);
    });
    
    // Add new event listeners for calendar dates
    const calendarDates = document.querySelectorAll('.calendar-date');
    calendarDates.forEach(dateElement => {
        dateElement.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Get today's date for comparison
            const today = new Date();
            const todayDate = today.getDate();
            const todayMonth = today.getMonth() + 1;
            const todayYear = today.getFullYear();
            
            // Remove clicked styling from all dates except today
            calendarDates.forEach(d => {
                const dateValue = parseInt(d.getAttribute('data-date'));
                const dateYear = parseInt(d.getAttribute('data-year'));
                const dateMonth = parseInt(d.getAttribute('data-month'));
                
                // Remove clicked styling from all dates
                d.classList.remove('border-2', 'border-dashed', 'border-purple-600', 'text-purple-600', 'font-semibold');
                
                // Only remove today's background styling if it's not today's date
                if (!(dateValue === todayDate && dateYear === todayYear && dateMonth === todayMonth)) {
                    d.classList.remove('bg-purple-600', 'text-white');
                }
            });
            
            // Check if clicked date is today
            const clickedDate = parseInt(this.getAttribute('data-date'));
            const clickedYear = parseInt(this.getAttribute('data-year'));
            const clickedMonth = parseInt(this.getAttribute('data-month'));
            const isClickedToday = (clickedDate === todayDate && clickedYear === todayYear && clickedMonth === todayMonth);
            
            // Add clicked styling (border-dashed for non-today dates, keep background for today)
            if (!isClickedToday) {
                this.classList.add('border-2', 'border-dashed', 'border-purple-600', 'text-purple-600', 'font-semibold');
            }
            
            // Get date information
            const date = this.getAttribute('data-date');
            const year = this.getAttribute('data-year') || {!! $calendarYear ?? date('Y') !!};
            const month = this.getAttribute('data-month') || {!! $calendarMonth ?? date('n') !!};
            
            if (date) {
                loadProjectsForDate(date, year, month);
            }
        });
    });
    
    console.log('Calendar date clicks initialized for', calendarDates.length, 'dates');
}

// Function to reset calendar view to default
function resetCalendarView() {
    // Get today's date
    const today = new Date();
    const todayDate = today.getDate();
    const todayMonth = today.getMonth() + 1; // JavaScript months are 0-based
    const todayYear = today.getFullYear();
    
    // Get current displayed month/year
    const displayedYear = {!! $calendarYear ?? date('Y') !!};
    const displayedMonth = {!! $calendarMonth ?? date('n') !!};
    
    // Remove clicked styling from all calendar dates
    const calendarDates = document.querySelectorAll('.calendar-date');
    calendarDates.forEach(date => {
        // Remove clicked border styling
        date.classList.remove('border-2', 'border-dashed', 'border-purple-600', 'text-purple-600', 'font-semibold');
        // Remove background styling
        date.classList.remove('bg-purple-600', 'text-white');
        
        // Re-apply today's highlight if we're viewing the current month
        if (displayedYear === todayYear && displayedMonth === todayMonth) {
            const dateValue = parseInt(date.getAttribute('data-date'));
            const dateYear = parseInt(date.getAttribute('data-year'));
            const dateMonth = parseInt(date.getAttribute('data-month'));
            
            if (dateValue === todayDate && dateYear === todayYear && dateMonth === todayMonth) {
                // Re-apply today's styling
                date.classList.add('bg-purple-600', 'text-white');
            }
        }
    });
    
    // Hide the projects-list section (selected date projects)
    const projectsList = document.getElementById('projects-list');
    if (projectsList) {
        projectsList.innerHTML = '';
        projectsList.style.display = 'none';
    }
    
    // Show the default project-notes section
    const projectNotes = document.getElementById('project-notes');
    if (projectNotes) {
        projectNotes.style.display = 'block';
    }
    
    console.log('Calendar view reset to default with today highlighted');
}

// Initialize event listeners
function initializeCalendarNavigation() {
    // Remove any existing listeners first
    const existingButtons = document.querySelectorAll('.calendar-nav-btn');
    existingButtons.forEach(btn => {
        btn.replaceWith(btn.cloneNode(true));
    });
    
    // Add new event listeners for navigation buttons
    const navigationButtons = document.querySelectorAll('.calendar-nav-btn');
    navigationButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            if (isNavigating) {
                console.log('Click ignored - navigation in progress');
                return false;
            }
            
            const year = parseInt(this.getAttribute('data-year'));
            const month = parseInt(this.getAttribute('data-month'));
            
            if (year && month) {
                navigateCalendar(year, month);
            } else {
                console.error('Invalid year or month data:', { year, month });
            }
            
            return false;
        });
        
        // Prevent double-click
        btn.addEventListener('dblclick', function(e) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        });
    });
    
    // Add event listeners for dropdown filters
    const yearFilter = document.getElementById('calendar-year-filter');
    const monthFilter = document.getElementById('calendar-month-filter');
    
    if (yearFilter) {
        yearFilter.addEventListener('change', function(e) {
            if (isNavigating) {
                console.log('Filter change ignored - navigation in progress');
                return;
            }
            
            const selectedYear = parseInt(this.value);
            const currentMonth = monthFilter ? parseInt(monthFilter.value) : {!! $calendarMonth ?? 1 !!};
            
            if (selectedYear && currentMonth) {
                console.log('Year filter changed to: ' + selectedYear + '-' + currentMonth);
                navigateCalendar(selectedYear, currentMonth);
            }
        });
    }
    
    if (monthFilter) {
        monthFilter.addEventListener('change', function(e) {
            if (isNavigating) {
                console.log('Filter change ignored - navigation in progress');
                return;
            }
            
            const selectedMonth = parseInt(this.value);
            const currentYear = yearFilter ? parseInt(yearFilter.value) : {!! $calendarYear ?? date('Y') !!};
            
            if (selectedMonth && currentYear) {
                console.log('Month filter changed to: ' + currentYear + '-' + selectedMonth);
                navigateCalendar(currentYear, selectedMonth);
            }
        });
    }
    
    // Add event listener for reset button
    const resetButton = document.getElementById('reset-calendar-btn');
    if (resetButton) {
        resetButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            resetCalendarView();
        });
    }
    
    console.log('Calendar navigation initialized');
}

// Handle browser back/forward
window.addEventListener('popstate', function(event) {
    if (!isNavigating) {
        console.log('Popstate detected, reloading page');
        location.reload();
    }
});

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initializeCalendarNavigation();
    initializeCalendarDateClicks();
    
    // Initialize Chart.js for Project Development Chart
    var chartElement = document.getElementById('projectChart');
    if (chartElement && typeof Chart !== 'undefined') {
        var ctx = chartElement.getContext('2d');
        var chartData = @json($chartData);
        
        // Prepare chart data from PHP
        var labels = chartData.map(function(item) { return item.period; });
        var data = chartData.map(function(item) { return item.count; });
        
        // Create modern gradient for area chart
        var gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(59, 130, 246, 0.3)'); // Blue with transparency
        gradient.addColorStop(0.5, 'rgba(59, 130, 246, 0.1)');
        gradient.addColorStop(1, 'rgba(59, 130, 246, 0.05)');
        
        // Store chart reference globally for updates
        currentChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Proyek',
                    data: data,
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: '#3b82f6',
                    borderWidth: 3,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: '#1d4ed8',
                    pointHoverBorderColor: '#ffffff',
                    pointHoverBorderWidth: 3,
                    tension: 0.4, // Smooth curves
                    shadowOffsetX: 0,
                    shadowOffsetY: 4,
                    shadowBlur: 10,
                    shadowColor: 'rgba(59, 130, 246, 0.3)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        top: 20,
                        right: 20,
                        bottom: 10,
                        left: 10
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'rgba(255, 255, 255, 0.95)',
                        titleColor: '#1f2937',
                        bodyColor: '#374151',
                        borderColor: '#e5e7eb',
                        borderWidth: 1,
                        cornerRadius: 12,
                        displayColors: false,
                        padding: 12,
                        titleFont: {
                            size: 14,
                            weight: '600'
                        },
                        bodyFont: {
                            size: 13,
                            weight: '500'
                        },
                        callbacks: {
                            title: function(context) {
                                return context[0].label;
                            },
                            label: function(context) {
                                return context.parsed.y + ' proyek';
                            }
                        },
                        external: function(context) {
                            // Custom tooltip styling
                            const tooltip = context.tooltip;
                            if (tooltip.opacity === 0) {
                                return;
                            }
                            
                            // Add shadow to tooltip
                            const tooltipEl = document.querySelector('.chartjs-tooltip');
                            if (tooltipEl) {
                                tooltipEl.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.1)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        display: true,
                        border: {
                            display: false
                        },
                        ticks: {
                            stepSize: 1,
                            color: '#9ca3af',
                            font: {
                                size: 11,
                                weight: '400'
                            },
                            padding: 10,
                            callback: function(value) {
                                return value;
                            }
                        },
                        grid: {
                            color: 'rgba(229, 231, 235, 0.4)',
                            drawBorder: false,
                            lineWidth: 1
                        }
                    },
                    x: {
                        display: true,
                        border: {
                            display: false
                        },
                        ticks: {
                            color: '#6b7280',
                            font: {
                                size: 11,
                                weight: '500'
                            },
                            padding: 10
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 8
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutQuart'
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
        
        console.log('Chart.js initialized successfully');
        
        // Initialize chart filters for auto-filtering
        initializeChartFilters();
    } else {
        console.log('Chart.js not available or chart element not found');
    }
    
    // Auto-redirect to current month on page reload (not navigation)
    const urlParams = new URLSearchParams(window.location.search);
    const now = new Date();
    const currentYear = now.getFullYear();
    const currentMonth = now.getMonth() + 1; // JavaScript months are 0-based
    
    // Check if we're already showing the current month
    const displayedYear = {!! $calendarYear ?? date('Y') !!};
    const displayedMonth = {!! $calendarMonth ?? date('n') !!};
    
    // Check if this is a page reload (not a navigation)
    // We detect this by checking if the page was loaded via navigation or refresh
    const isPageReload = performance.getEntriesByType('navigation')[0]?.type === 'reload';
    const isBackForward = performance.getEntriesByType('navigation')[0]?.type === 'back_forward';
    
    // Redirect to current month if:
    // 1. It's a page reload, OR
    // 2. It's back/forward navigation, OR  
    // 3. We're not showing the current month and no recent navigation happened
    if (isPageReload || isBackForward || (displayedYear !== currentYear || displayedMonth !== currentMonth)) {
        // Check if this might be from recent navigation (within last 2 seconds)
        const lastNavigationTime = sessionStorage.getItem('lastCalendarNavigation');
        const timeSinceLastNav = lastNavigationTime ? Date.now() - parseInt(lastNavigationTime) : Infinity;
        
        // Only redirect if it's been more than 2 seconds since last navigation
        // OR if it's definitely a page reload/back-forward
        if (isPageReload || isBackForward || timeSinceLastNav > 2000) {
            console.log('Redirecting to current month: ' + currentYear + '-' + currentMonth + ' (reload detected)');
            
            // Clear any existing calendar parameters and set current month
            urlParams.delete('calendar_year');
            urlParams.delete('calendar_month');
            urlParams.set('calendar_year', currentYear);
            urlParams.set('calendar_month', currentMonth);
            
            // Clear the navigation timestamp
            sessionStorage.removeItem('lastCalendarNavigation');
            
            // Redirect to current month
            window.location.href = window.location.pathname + '?' + urlParams.toString();
            return; // Exit early to prevent other initialization
        }
    }
    
    console.log('Calendar navigation system ready');
});

// Re-initialize after any dynamic content updates
document.addEventListener('calendarUpdated', function() {
    initializeCalendarNavigation();
    initializeCalendarDateClicks();
});
</script>

@endsection