@extends('layouts.app')

@section('title', 'Daftar Proyek')

@section('content')
<div class="w-full content-container">
    <!-- Page Header -->
    <div class="relative overflow-hidden bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-500 rounded-2xl shadow-2xl mb-8">
        <!-- Animated background pattern -->
        <div class="absolute inset-0 bg-gradient-to-r from-green-600/20 via-teal-600/20 to-cyan-500/20 animate-pulse"></div>
        
        <!-- Floating decorative elements -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-white/20 to-white/5 rounded-full blur-xl transform translate-x-8 -translate-y-8 animate-bounce"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-white/15 to-white/5 rounded-full blur-lg transform -translate-x-6 translate-y-6 animate-pulse"></div>
        <div class="absolute top-1/2 right-1/4 w-16 h-16 bg-white/10 rounded-full blur-md animate-ping"></div>
        
        <!-- Geometric patterns -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="project-grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#project-grid)" />
            </svg>
        </div>
        
        <div class="relative px-6 py-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                <div class="flex items-center space-x-5">
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-white/30 to-white/10 rounded-2xl flex items-center justify-center backdrop-blur-md border border-white/30 shadow-2xl transform hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-orange-400 rounded-full animate-pulse"></div>
                    </div>
                    <div class="space-y-1">
                        <h1 class="text-2xl font-bold text-white drop-shadow-lg tracking-tight">Daftar Proyek</h1>
                        <p class="text-emerald-100 text-sm font-medium drop-shadow-sm">Kelola semua proyek client Anda dengan mudah dan efisien</p>
                        <div class="flex items-center space-x-2 mt-2">
                            <div class="w-2 h-2 bg-orange-400 rounded-full animate-pulse"></div>
                            <span class="text-xs text-emerald-200">{{ $projects->total() }} Total Proyek</span>
                        </div>
                    </div>
                </div>
                
                <div class="w-full lg:w-auto">
                    <button @click="$dispatch('open-project-modal')" class="group w-full lg:w-auto inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-white/25 to-white/15 backdrop-blur-md text-white font-semibold rounded-xl shadow-xl hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-white/30 transition-all duration-300 border border-white/30 hover:border-white/50 transform hover:scale-105 hover:-translate-y-1 active:scale-95 cursor-pointer">
                        <div class="flex items-center space-x-3">
                            <div class="w-5 h-5 bg-white/20 rounded-lg flex items-center justify-center group-hover:bg-white/30 transition-colors duration-200">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <span class="tracking-wide">Tambah Proyek</span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="rounded-md bg-green-50 p-4 mb-8">
            <div class="text-sm text-green-700">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Search and Filters -->
    <div class="relative overflow-hidden bg-white/80 backdrop-blur-md shadow-xl rounded-2xl border border-gray-200/50 mb-8">
        <!-- Decorative background -->
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-teal-50/30 to-cyan-50/50"></div>
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-100/30 to-teal-100/20 rounded-full blur-2xl transform translate-x-16 -translate-y-16"></div>
        
        <div class="relative p-6">
            <form action="{{ route('projects.index') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="md:col-span-3">
                        <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">Pencarian Proyek</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none z-10">
                                <svg class="h-5 w-5 text-gray-600 group-focus-within:text-emerald-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" 
                                class="block w-full pl-10 pr-4 py-3.5 border border-gray-200 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 bg-white/80 backdrop-blur-sm text-gray-900 placeholder-gray-500 transition-all duration-200 hover:bg-white/90 focus:bg-white" 
                                placeholder="Cari proyek (nama, url, client)..." 
                                value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="flex flex-col justify-end">
                        <div class="flex items-center space-x-3">
                            <button type="submit" class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-emerald-500/30 transition-all duration-300 transform hover:scale-105 hover:-translate-y-0.5 cursor-pointer">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Cari
                            </button>
                            <a href="{{ route('projects.index') }}" class="inline-flex items-center justify-center px-4 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl bg-white/70 backdrop-blur-sm hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200/50 transition-all duration-200 transform hover:scale-105 cursor-pointer">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Reset
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Projects List -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200 mb-8">

        <!-- Mobile view -->
        <div class="lg:hidden divide-y divide-gray-100 rounded-t-lg rounded-b-lg">
            @forelse($projects as $project)
                <div class="px-4 py-2">
                    <div class="space-y-2">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <a href="{{ route('projects.show', $project) }}" style="transition: color 0.3s;" onmouseover="this.style.color='#8b5cf6';this.querySelector('.website-name').style.color='#8b5cf6'" onmouseout="this.style.color='';this.querySelector('.website-name').style.color=''">
                                    <h4 class="text-[11px] leading-4 font-medium text-gray-900 website-name">{{ $project->website_name }}</h4>
                                </a>
                            </div>
                            <div class="flex space-x-1">
                                <a href="{{ route('projects.show', $project) }}" class="text-blue-600 hover:text-blue-800 p-1 rounded hover:bg-blue-50" title="Lihat">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <button @click="$dispatch('open-edit-modal', { project: {{ json_encode($project) }} })" class="text-yellow-600 hover:text-yellow-800 p-1 rounded hover:bg-yellow-50 cursor-pointer" title="Edit">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <form method="POST" action="{{ route('projects.destroy', $project) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 p-1 rounded hover:bg-red-50" title="Hapus">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-3 text-[11px] leading-4">
                            <div>
                                <span class="text-gray-500">Domain:</span>
                                <div class="font-medium text-gray-900">
                                    @if($project->url)
                                        <a href="{{ $project->url }}" target="_blank" rel="nofollow" class="text-blue-600 hover:text-blue-800 flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                            {{ $project->url }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                            <div>
                                <span class="text-gray-500">Client:</span>
                                <div class="font-medium text-gray-900">{{ $project->client->name }}</div>
                            </div>
                            <div>
                                <span class="text-gray-500">Status:</span>
                                <div>
                                    <span class="inline-flex px-1.5 py-0.5 text-[11px] font-medium leading-4 rounded 
                                    @if($project->status === 'planning') bg-purple-100 text-purple-800 border border-purple-300 !important
                                    @elseif($project->status === 'development') bg-blue-100 text-blue-800 border border-blue-300
                                    @elseif($project->status === 'testing') bg-yellow-100 text-yellow-800 border border-yellow-300
                                    @elseif($project->status === 'completed') bg-green-100 text-green-800 border border-green-300
                                    @elseif($project->status === 'maintenance') bg-red-100 text-red-800 border border-red-300
                                    @else bg-gray-100 text-gray-800 border border-gray-300 @endif">
                                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <span class="text-gray-500">Paket:</span>
                                <div>
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
                                    <span class="inline-flex px-1.5 py-0.5 text-[11px] font-medium leading-4 rounded border {{ $colorClass }}">
                                        {{ $project->package_status_label }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <span class="text-gray-500">Pembayaran:</span>
                                <div>
                                    <span class="inline-flex px-1.5 py-0.5 text-[11px] font-medium leading-4 rounded border
                                    @if($project->payment_status === 'paid') bg-green-100 text-green-800 border-green-300
                                    @elseif($project->payment_status === 'pending') bg-yellow-100 text-yellow-800 border-yellow-300
                                    @elseif($project->payment_status === 'overdue') bg-red-100 text-red-800 border-red-300
                                    @else bg-gray-100 text-gray-800 border-gray-300 @endif">
                                        {{ ucfirst($project->payment_status) }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <span class="text-gray-500">Hosting:</span>
                                <div class="space-y-1">
                                    @if($project->hosting_provider)
                                        <span class="inline-flex px-1.5 py-0.5 text-[11px] font-medium leading-4 rounded border bg-gray-100 text-gray-800 border-gray-300">
                                            {{ $project->hosting_provider }}
                                        </span>
                                    @else
                                        <div class="font-medium text-gray-900">-</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-[11px] leading-4 font-medium text-gray-900">Tidak ada proyek</h3>
                    <p class="mt-1 text-[11px] leading-4 text-gray-500">Mulai dengan membuat proyek pertama Anda.</p>
                    <div class="mt-6">
                        <button @click="$dispatch('open-project-modal')" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-[11px] leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Proyek
                        </button>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Desktop view -->
        <div class="hidden lg:block overflow-x-auto rounded-t-lg rounded-b-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left text-[11px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Website
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-[11px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Client
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-[11px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Paket
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-[11px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Domain
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-[11px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Hosting
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-[11px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Pembayaran
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-[11px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-[11px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($projects as $project)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <a href="{{ route('projects.show', $project) }}" style="transition: color 0.3s;" onmouseover="this.style.color='#8b5cf6';this.querySelector('.website-name').style.color='#8b5cf6'" onmouseout="this.style.color='';this.querySelector('.website-name').style.color=''">
                                    <div class="text-[11px] leading-4 font-medium text-gray-900 website-name">{{ $project->website_name }}</div>
                                </a>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-[11px] leading-4 text-gray-700">{{ $project->client->name }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">
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
                                <span class="inline-flex px-2 py-1 text-[11px] font-semibold leading-4 rounded-full border {{ $colorClass }}">
                                    {{ $project->package_status_label }}
                                </span>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-[11px] leading-4 text-gray-700">
                                @if($project->url)
                                    <a href="{{ $project->url }}" target="_blank" rel="nofollow" class="text-[11px] leading-4 text-blue-600 hover:text-blue-800 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                        <span class="truncate">{{ $project->url }}</span>
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <div class="flex flex-col space-y-1">
                                    @if($project->hosting_provider)
                                        <span class="inline-flex px-2 py-1 text-[11px] font-semibold leading-4 rounded-full border bg-gray-100 text-gray-800 border-gray-300">
                                            {{ $project->hosting_provider }}
                                        </span>
                                    @else
                                        <div class="text-[11px] leading-4 text-gray-700">-</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-[11px] font-semibold leading-4 rounded-full 
                                    @if($project->payment_status === 'paid') bg-green-100 text-green-800 border border-green-300
                                    @elseif($project->payment_status === 'pending') bg-yellow-100 text-yellow-800 border border-yellow-300
                                    @elseif($project->payment_status === 'overdue') bg-red-100 text-red-800 border border-red-300
                                    @else bg-gray-100 text-gray-800 border border-gray-300 @endif">
                                    {{ ucfirst($project->payment_status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-[11px] font-semibold leading-4 rounded-full 
                                    @if($project->status === 'planning') bg-purple-100 text-purple-800 border border-purple-300 !important
                                    @elseif($project->status === 'development') bg-blue-100 text-blue-800 border border-blue-300
                                    @elseif($project->status === 'testing') bg-yellow-100 text-yellow-800 border border-yellow-300
                                    @elseif($project->status === 'completed') bg-green-100 text-green-800 border border-green-300
                                    @elseif($project->status === 'maintenance') bg-red-100 text-red-800 border border-red-300
                                    @else bg-gray-100 text-gray-800 border border-gray-300 @endif">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-[11px] leading-4 font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('projects.show', $project) }}" class="text-blue-600 hover:text-blue-800" title="Lihat">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <button @click="$dispatch('open-edit-modal', { project: {{ json_encode($project) }} })" class="text-yellow-600 hover:text-yellow-800 cursor-pointer" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <form method="POST" action="{{ route('projects.destroy', $project) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h3 class="mt-2 text-[11px] leading-4 font-medium text-gray-900">Tidak ada proyek</h3>
                                <p class="mt-1 text-[11px] leading-4 text-gray-500">Tidak ada proyek yang cocok dengan pencarian Anda.</p>
                                <div class="mt-6">
                                    <button @click="$dispatch('open-project-modal')" class="inline-flex items-center px-5 py-2.5 border border-transparent shadow-md text-sm font-medium rounded-lg text-white bg-gradient-to-r from-violet-600 via-indigo-600 to-blue-600 hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Tambah Proyek
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($projects->hasPages())
            <div class="px-8 py-4 border-t border-gray-200/50 bg-gradient-to-r from-gray-50/50 to-gray-100/30 backdrop-blur-sm relative rounded-b-lg">
                {{ $projects->appends(request()->query())->links('custom.pagination') }}
            </div>
        @endif
    </div>
</div>

<!-- Modal Tambah Proyek -->
<div x-data="{ 
    showModal: false,
    isSubmitting: false,
    showSuccess: false,
    submitForm(event) {
        event.preventDefault();
        this.isSubmitting = true;
        
        const formData = new FormData(event.target);
        
        fetch('{{ route('projects.store') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.showSuccess = true;
                event.target.reset();
                setTimeout(() => {
                    this.showModal = false;
                    this.showSuccess = false;
                    window.location.reload();
                }, 1500);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menyimpan data');
        })
        .finally(() => {
            this.isSubmitting = false;
        });
    }
}" 
     @open-project-modal.window="showModal = true"
     x-cloak x-show="showModal" 
     x-transition:enter="transition ease-out duration-300" 
     x-transition:enter-start="opacity-0" 
     x-transition:enter-end="opacity-100" 
     x-transition:leave="transition ease-in duration-200" 
     x-transition:leave-start="opacity-100" 
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 overflow-y-auto">
        
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-black/70 backdrop-blur-md" @click="showModal = false"></div>
        
        <!-- Modal container -->
        <div class="flex min-h-full items-center justify-center p-2 sm:p-4">
            <div x-show="showModal" 
                 x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-200" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative w-full max-w-sm sm:max-w-md md:max-w-2xl lg:max-w-4xl bg-white rounded-xl sm:rounded-2xl shadow-2xl overflow-hidden border border-gray-200/50 ring-1 ring-gray-100/50 backdrop-filter max-h-[95vh] overflow-y-auto">
                
                <!-- Success Message -->
                <div x-show="showSuccess" 
                     x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="opacity-0 -translate-y-2" 
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute top-2 sm:top-4 left-2 sm:left-4 right-2 sm:right-4 z-50 bg-green-500 text-white px-3 sm:px-4 py-2 sm:py-3 rounded-lg sm:rounded-xl shadow-lg flex items-center space-x-2 sm:space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium">Proyek berhasil ditambahkan!</span>
                </div>
            <!-- Modal Header -->
                <div class="relative bg-gradient-to-r from-violet-600 via-indigo-600 to-blue-600 px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                    <div class="absolute inset-0 bg-black/20 backdrop-blur-[4px]"></div>
                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center space-x-3 sm:space-x-4">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center shadow-lg border border-white/20 transform hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-white tracking-tight drop-shadow-md">Tambah Proyek Baru</h3>
                        </div>
                        <button @click="showModal = false" class="text-white/80 hover:text-white hover:bg-white/20 rounded-lg p-2 sm:p-2.5 transition-all duration-200 cursor-pointer">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

            <!-- Modal Body -->
                <div class="p-4 sm:p-6 lg:p-10 bg-gradient-to-br from-white to-gray-50/80">
                    <form @submit="submitForm" class="space-y-4 sm:space-y-6 lg:space-y-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
                        <div class="space-y-2">
                            <label for="client_id" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <span>Client <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="client_id" id="client_id" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                    <option value="">Pilih Client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->name }} ({{ $client->email }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="website_name" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                </div>
                                <span>Nama Website <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <input type="text" name="website_name" id="website_name" required
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
                        <div class="space-y-2">
                            <label for="url" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                    </svg>
                                </div>
                                <span>URL Website</span>
                            </label>
                            <div class="relative group">
                                <input type="url" name="url" id="url" placeholder="https://"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="status" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Status Proyek <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="status" id="status" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                    <option value="">Pilih Status</option>
                                    <option value="planning">Planning</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="on_hold">On Hold</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
                        <div class="space-y-2">
                            <label for="domain_expiry" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Tanggal Kadaluarsa Domain</span>
                            </label>
                            <div class="relative group">
                                <input type="date" name="domain_expiry" id="domain_expiry"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="hosting_expiry" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Tanggal Kadaluarsa Hosting</span>
                            </label>
                            <div class="relative group">
                                <input type="date" name="hosting_expiry" id="hosting_expiry"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
                        <div class="space-y-2">
                            <label for="hosting_provider" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                                    </svg>
                                </div>
                                <span>Provider Hosting</span>
                            </label>
                            <div class="relative group">
                                <select name="hosting_provider" id="hosting_provider"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white appearance-none">
                                    <option value="">Pilih Provider Hosting</option>
                                    <option value="Shared Hosting">Shared Hosting</option>
                                    <option value="Cloud Server">Cloud Server</option>
                                    <option value="VPS Server">VPS Server</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="price_display" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Harga (Rp) <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <input type="text" id="price_display" placeholder="0" required
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <input type="hidden" name="price" id="price">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
                        <div class="space-y-2">
                            <label for="payment_date" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Tanggal Pembayaran</span>
                            </label>
                            <div class="relative group">
                                <input type="date" name="payment_date" id="payment_date"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="payment_status" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Status Pembayaran <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="payment_status" id="payment_status" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white appearance-none">
                                    <option value="">Pilih Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="overdue">Overdue</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="package_status" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                            <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <span>Status Paket <span class="text-red-500">*</span></span>
                        </label>
                        <div class="relative group">
                            <select name="package_status" id="package_status" required
                                    class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white appearance-none">
                                <option value="">Pilih Paket</option>
                                <option value="website">Pembuatan Website</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="seo">SEO</option>
                                <option value="website_maintenance">Pembuatan Website, Maintenance</option>
                                <option value="website_seo">Pembuatan Website, SEO</option>
                                <option value="website_maintenance_seo">Pembuatan Website, Maintenance, SEO</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="notes" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                            <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <span>Catatan</span>
                        </label>
                        <div class="relative group">
                            <textarea name="notes" id="notes" rows="4"
                                      class="block w-full rounded-xl border-gray-300 pl-4 pr-4 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white"></textarea>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex flex-col sm:flex-row items-center justify-end gap-3 sm:gap-5 pt-4 sm:pt-8 mt-2 border-t border-gray-200/70 bg-gradient-to-b from-transparent to-gray-50/80">
                        <button type="button" @click="showModal = false" 
                                :disabled="isSubmitting"
                                class="w-full sm:w-auto px-4 sm:px-7 py-2.5 sm:py-3.5 border border-gray-300 bg-white text-gray-700 font-medium rounded-lg sm:rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer flex items-center justify-center gap-2 shadow-sm hover:shadow-md text-sm sm:text-base">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span>Batal</span>
                        </button>
                        <button type="submit" 
                                :disabled="isSubmitting"
                                class="w-full sm:w-auto px-4 sm:px-7 py-2.5 sm:py-3.5 bg-gradient-to-r from-violet-600 via-indigo-600 to-blue-600 text-white font-semibold rounded-lg sm:rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/30 transition-all duration-300 transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none cursor-pointer flex items-center justify-center gap-2 text-sm sm:text-base">
                            <svg x-show="!isSubmitting" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <svg x-show="isSubmitting" class="animate-spin w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <span x-show="!isSubmitting">Simpan Proyek</span>
                            <span x-show="isSubmitting">Menyimpan...</span>
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const priceDisplayInput = document.getElementById('price_display');
    const priceHiddenInput = document.getElementById('price');
    
    // Function to format number with dots as thousand separators
    function formatRupiah(value) {
        // Remove all non-digit characters
        const number = value.replace(/\D/g, '');
        
        // Add dots as thousand separators
        return number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
    
    // Function to get raw number (remove dots)
    function getRawNumber(value) {
        return value.replace(/\./g, '');
    }
    
    // Format input on keyup and update hidden input
    priceDisplayInput.addEventListener('input', function(e) {
        const cursorPosition = e.target.selectionStart;
        const oldValue = e.target.value;
        const oldLength = oldValue.length;
        
        // Format the value
        const formattedValue = formatRupiah(e.target.value);
        e.target.value = formattedValue;
        
        // Update hidden input with raw value
        const rawValue = getRawNumber(formattedValue);
        priceHiddenInput.value = rawValue;
        
        // Adjust cursor position
        const newLength = formattedValue.length;
        const newCursorPosition = cursorPosition + (newLength - oldLength);
        e.target.setSelectionRange(newCursorPosition, newCursorPosition);
    });
    
    // Prevent non-numeric input
    priceDisplayInput.addEventListener('keypress', function(e) {
        // Allow backspace, delete, tab, escape, enter
        if ([8, 9, 27, 13, 46].indexOf(e.keyCode) !== -1 ||
            // Allow Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
            (e.keyCode === 65 && e.ctrlKey === true) ||
            (e.keyCode === 67 && e.ctrlKey === true) ||
            (e.keyCode === 86 && e.ctrlKey === true) ||
            (e.keyCode === 88 && e.ctrlKey === true)) {
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>

<!-- Modal Edit Proyek -->
<div x-data="editProjectModal" 
     @open-edit-modal.window="openEditModal($event.detail.project)"
     x-cloak x-show="showEditModal" 
     x-transition:enter="transition ease-out duration-300" 
     x-transition:enter-start="opacity-0" 
     x-transition:enter-end="opacity-100" 
     x-transition:leave="transition ease-in duration-200" 
     x-transition:leave-start="opacity-100" 
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 overflow-y-auto">
        
    <!-- Background overlay -->
    <div class="fixed inset-0 bg-black/70 backdrop-blur-md" @click="closeEditModal()"></div>
    
    <!-- Modal container -->
    <div class="flex min-h-full items-center justify-center p-2 sm:p-4">
        <div x-show="showEditModal" 
             x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0 scale-95" 
             x-transition:enter-end="opacity-100 scale-100" 
             x-transition:leave="transition ease-in duration-200" 
             x-transition:leave-start="opacity-100 scale-100" 
             x-transition:leave-end="opacity-0 scale-95"
             class="relative w-full max-w-sm sm:max-w-md md:max-w-2xl lg:max-w-4xl bg-white rounded-xl sm:rounded-2xl shadow-2xl overflow-hidden border border-gray-200/50 ring-1 ring-gray-100/50 backdrop-filter max-h-[95vh] overflow-y-auto">
            
            <!-- Success Message -->
            <div x-show="showSuccess" 
                 x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 -translate-y-2" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 x-transition:leave="transition ease-in duration-200" 
                 x-transition:leave-start="opacity-100 translate-y-0" 
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="absolute top-4 left-4 right-4 z-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl shadow-lg p-4"
                 style="display: none;">
                <div class="flex items-center text-white">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium">Proyek berhasil diperbarui!</span>
                </div>
            </div>
            
            <!-- Modal Header -->
            <div class="relative bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 px-6 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/30 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Edit Proyek</h3>
                            <p class="text-blue-100 text-sm">Perbarui informasi proyek</p>
                        </div>
                    </div>
                    <button @click="closeEditModal()" 
                            class="text-white/80 hover:text-white p-2 rounded-lg hover:bg-white/10 transition-colors duration-200 cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 -mt-2 -mr-2 w-16 h-16 bg-white/10 rounded-full"></div>
                <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-20 h-20 bg-white/5 rounded-full"></div>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6 max-h-[70vh] overflow-y-auto">
                <form @submit.prevent="submitEditForm" id="editProjectForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Client -->
                        <div class="group">
                            <label for="edit_client_id" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <span>Client <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="client_id" id="edit_client_id" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                    <option value="">Pilih Client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }} ({{ $client->email }})</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Nama Website -->
                        <div class="group">
                            <label for="edit_website_name" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-emerald-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                                    </svg>
                                </div>
                                <span>Nama Website <span class="text-red-500">*</span></span>
                            </label>
                            <input type="text" name="website_name" id="edit_website_name" required
                                   class="block w-full rounded-xl border-gray-300 px-4 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm transition-all duration-200 hover:bg-white hover:border-emerald-300 focus:bg-white"
                                   placeholder="Masukkan nama website">
                        </div>

                        <!-- URL Website -->
                        <div class="group">
                            <label for="edit_url" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-blue-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                    </svg>
                                </div>
                                <span>URL Website</span>
                            </label>
                            <input type="url" name="url" id="edit_url"
                                   class="block w-full rounded-xl border-gray-300 px-4 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm transition-all duration-200 hover:bg-white hover:border-blue-300 focus:bg-white"
                                   placeholder="https://example.com">
                        </div>

                        <!-- Status Proyek -->
                        <div class="group">
                            <label for="edit_status" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-purple-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Status Proyek <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="status" id="edit_status" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-purple-500 focus:ring-purple-500 text-sm transition-all duration-200 hover:bg-white hover:border-purple-300 focus:bg-white">
                                    <option value="planning">Planning</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="on_hold">On Hold</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-purple-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Kadaluarsa Domain -->
                        <div class="group">
                            <label for="edit_domain_expiry" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Tanggal Kadaluarsa Domain</span>
                            </label>
                            <input type="date" name="domain_expiry" id="edit_domain_expiry"
                                   class="block w-full rounded-xl border-gray-300 px-4 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                        </div>

                        <!-- Tanggal Kadaluarsa Hosting -->
                        <div class="group">
                            <label for="edit_hosting_expiry" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Tanggal Kadaluarsa Hosting</span>
                            </label>
                            <input type="date" name="hosting_expiry" id="edit_hosting_expiry"
                                   class="block w-full rounded-xl border-gray-300 px-4 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                        </div>

                        <!-- Penyedia Hosting -->
                        <div class="group">
                            <label for="edit_hosting_provider" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-teal-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                                    </svg>
                                </div>
                                <span>Penyedia Hosting</span>
                            </label>
                            <div class="relative group">
                                <select name="hosting_provider" id="edit_hosting_provider"
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-teal-500 focus:ring-teal-500 text-sm transition-all duration-200 hover:bg-white hover:border-teal-300 focus:bg-white">
                                    <option value="">Pilih Penyedia Hosting</option>
                                    <option value="Shared">Shared</option>
                                    <option value="Cloud">Cloud</option>
                                    <option value="VPS Server">VPS Server</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-teal-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Harga -->
                        <div class="group">
                            <label for="edit_price_display" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-green-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <span>Harga (Rp)</span>
                            </label>
                            <input type="text" id="edit_price_display"
                                   class="block w-full rounded-xl border-gray-300 px-4 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-green-500 focus:ring-green-500 text-sm transition-all duration-200 hover:bg-white hover:border-green-300 focus:bg-white"
                                   placeholder="0">
                            <input type="hidden" name="price" id="edit_price_raw">
                        </div>

                        <!-- Tanggal Pembayaran -->
                        <div class="group">
                            <label for="edit_payment_date" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Tanggal Pembayaran</span>
                            </label>
                            <input type="date" name="payment_date" id="edit_payment_date"
                                   class="block w-full rounded-xl border-gray-300 px-4 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                        </div>

                        <!-- Status Pembayaran -->
                        <div class="group">
                            <label for="edit_payment_status" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-emerald-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Status Pembayaran <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="payment_status" id="edit_payment_status" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm transition-all duration-200 hover:bg-white hover:border-emerald-300 focus:bg-white">
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="overdue">Overdue</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-emerald-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Status Paket -->
                        <div class="group">
                            <label for="edit_package_status" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                                <div class="w-6 h-6 rounded-md bg-amber-100 flex items-center justify-center mr-3">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                <span>Status Paket <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="package_status" id="edit_package_status" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-amber-500 focus:ring-amber-500 text-sm transition-all duration-200 hover:bg-white hover:border-amber-300 focus:bg-white">
                                    <option value="website">Pembuatan Website</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="seo">SEO</option>
                                    <option value="website_maintenance">Pembuatan Website + Maintenance</option>
                                    <option value="website_seo">Pembuatan Website + SEO</option>
                                    <option value="website_maintenance_seo">Pembuatan Website + Maintenance + SEO</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-amber-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Catatan -->
                    <div class="mt-6 group">
                        <label for="edit_notes" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                            <div class="w-6 h-6 rounded-md bg-gray-100 flex items-center justify-center mr-3">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span>Catatan</span>
                        </label>
                        <textarea name="notes" id="edit_notes" rows="4"
                                  class="block w-full rounded-xl border-gray-300 px-4 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-sm transition-all duration-200 hover:bg-white hover:border-gray-300 focus:bg-white resize-none"
                                  placeholder="Tambahkan catatan untuk proyek ini..."></textarea>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 mt-6">
                        <button type="button" @click="closeEditModal()" 
                                :disabled="isSubmitting"
                                class="px-6 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                            Batal
                        </button>
                        <button type="submit" 
                                :disabled="isSubmitting"
                                class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500/30 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none cursor-pointer">
                            <span x-show="!isSubmitting">Perbarui Proyek</span>
                            <span x-show="isSubmitting">Memperbarui...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editProjectModal', () => ({
        showEditModal: false,
        isSubmitting: false,
        showSuccess: false,
        currentProjectId: null,
        priceEventListenerAdded: false,
        
        openEditModal(project) {
            console.log('Opening edit modal for project:', project);
            this.currentProjectId = project.id;
            this.showEditModal = true;
            
            // Wait for modal to be fully rendered before filling data
            this.$nextTick(() => {
                setTimeout(() => {
                    this.fillFormData(project);
                }, 100);
            });
        },
        
        closeEditModal() {
            this.showEditModal = false;
            this.isSubmitting = false;
            this.showSuccess = false;
            this.currentProjectId = null;
            this.priceEventListenerAdded = false;
        },
        
        formatDateForInput(dateString) {
            if (!dateString) return '';
            
            try {
                // Handle different date formats
                let date;
                
                // If it's already in YYYY-MM-DD format, return as is
                if (/^\d{4}-\d{2}-\d{2}$/.test(dateString)) {
                    return dateString;
                }
                
                // If it's ISO format (2024-12-31T00:00:00.000000Z), parse and format
                if (dateString.includes('T') || dateString.includes('Z')) {
                    date = new Date(dateString);
                } else {
                    // Try to parse other formats
                    date = new Date(dateString);
                }
                
                // Check if date is valid
                if (isNaN(date.getTime())) {
                    console.warn('Invalid date format:', dateString);
                    return '';
                }
                
                // Format to YYYY-MM-DD
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                
                return `${year}-${month}-${day}`;
            } catch (error) {
                console.error('Error formatting date:', dateString, error);
                return '';
            }
        },

        fillFormData(project) {
            console.log('Filling form with project data:', project);
            
            // Wait for DOM to be ready
            this.$nextTick(() => {
                setTimeout(() => {
                    try {
                        // Fill form fields
                        const clientField = document.getElementById('edit_client_id');
                        const websiteNameField = document.getElementById('edit_website_name');
                        const urlField = document.getElementById('edit_url');
                        const statusField = document.getElementById('edit_status');
                        const domainExpiryField = document.getElementById('edit_domain_expiry');
                        const hostingExpiryField = document.getElementById('edit_hosting_expiry');
                        const hostingProviderField = document.getElementById('edit_hosting_provider');
                        const paymentDateField = document.getElementById('edit_payment_date');
                        const paymentStatusField = document.getElementById('edit_payment_status');
                        const packageStatusField = document.getElementById('edit_package_status');
                        const notesField = document.getElementById('edit_notes');
                        const priceDisplayField = document.getElementById('edit_price_display');
                        const priceRawField = document.getElementById('edit_price_raw');
                        
                        // Check if all required fields exist
                        if (!clientField || !websiteNameField) {
                            console.error('Required form fields not found');
                            alert('Form fields tidak ditemukan. Silakan refresh halaman.');
                            return;
                        }
                        
                        // Fill the fields
                        if (clientField) clientField.value = project.client_id || '';
                        if (websiteNameField) websiteNameField.value = project.website_name || '';
                        if (urlField) urlField.value = project.url || '';
                        if (statusField) statusField.value = project.status || '';
                        
                        // Handle date fields with proper formatting
                        if (domainExpiryField) {
                            const formattedDomainExpiry = this.formatDateForInput(project.domain_expiry);
                            domainExpiryField.value = formattedDomainExpiry;
                            console.log('Domain expiry formatted:', project.domain_expiry, '->', formattedDomainExpiry);
                        }
                        
                        if (hostingExpiryField) {
                            const formattedHostingExpiry = this.formatDateForInput(project.hosting_expiry);
                            hostingExpiryField.value = formattedHostingExpiry;
                            console.log('Hosting expiry formatted:', project.hosting_expiry, '->', formattedHostingExpiry);
                        }
                        
                        if (paymentDateField) {
                            const formattedPaymentDate = this.formatDateForInput(project.payment_date);
                            paymentDateField.value = formattedPaymentDate;
                            console.log('Payment date formatted:', project.payment_date, '->', formattedPaymentDate);
                        }
                        
                        if (hostingProviderField) hostingProviderField.value = project.hosting_provider || '';
                        if (paymentStatusField) paymentStatusField.value = project.payment_status || '';
                        if (packageStatusField) packageStatusField.value = project.package_status || '';
                        if (notesField) notesField.value = project.notes || '';
                        
                        // Handle price formatting
                        const price = project.price || 0;
                        if (priceDisplayField && priceRawField) {
                            if (price > 0) {
                                priceDisplayField.value = this.formatPrice(price);
                                priceRawField.value = price;
                            } else {
                                priceDisplayField.value = '';
                                priceRawField.value = '';
                            }
                        }
                        
                        // Setup price formatting event listener
                        this.setupPriceFormatting();
                        
                        console.log('Form filled successfully with formatted dates');
                        
                    } catch (error) {
                        console.error('Error filling form:', error);
                        alert('Terjadi kesalahan saat mengisi form: ' + error.message);
                    }
                }, 200);
            });
        },
        
        setupPriceFormatting() {
            if (this.priceEventListenerAdded) return;
            
            const priceDisplayInput = document.getElementById('edit_price_display');
            const priceRawInput = document.getElementById('edit_price_raw');
            
            if (priceDisplayInput && priceRawInput) {
                const handlePriceInput = (e) => {
                    let value = e.target.value.replace(/[^\d]/g, '');
                    if (value) {
                        e.target.value = this.formatPrice(parseInt(value));
                        priceRawInput.value = value;
                    } else {
                        e.target.value = '';
                        priceRawInput.value = '';
                    }
                };
                
                priceDisplayInput.addEventListener('input', handlePriceInput);
                this.priceEventListenerAdded = true;
                console.log('Price formatting event listener added');
            }
        },
        
        formatPrice(value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        },
        
        submitEditForm(event) {
            event.preventDefault();
            console.log('Submitting edit form for project ID:', this.currentProjectId);
            this.isSubmitting = true;
            
            const formData = new FormData(event.target);
            
            // Add _method for Laravel PUT request
            formData.append('_method', 'PUT');
            
            fetch(`/projects/${this.currentProjectId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                console.log('Submit response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Submit response data:', data);
                if (data.success) {
                    this.showSuccess = true;
                    setTimeout(() => {
                        this.closeEditModal();
                        window.location.reload();
                    }, 2000);
                } else {
                    console.error('Submit failed:', data);
                    alert('Terjadi kesalahan saat memperbarui proyek');
                }
            })
            .catch(error => {
                console.error('Error submitting form:', error);
                alert('Terjadi kesalahan saat memperbarui proyek: ' + error.message);
            })
            .finally(() => {
                this.isSubmitting = false;
            });
        }
    }));
});
</script>
@endsection