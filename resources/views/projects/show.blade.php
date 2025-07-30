@extends('layouts.app')

@section('title', 'Detail Proyek - ' . $project->website_name)

@section('content')
<div class="w-full" x-data="editProjectModal">
    <!-- Header Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 rounded-2xl shadow-2xl mb-8">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative px-6 py-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex items-center space-x-5">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-white/30 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/30">
                            <span class="text-2xl font-bold text-white">{{ strtoupper(substr($project->website_name, 0, 2)) }}</span>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white mb-1">{{ $project->website_name }}</h1>
                        <p class="text-blue-100 text-sm font-medium">Detail informasi proyek</p>
                        <div class="flex items-center mt-2 space-x-2">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-white/20 text-white border border-white/30">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ $project->client->name }}
                            </span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-white/20 text-white border border-white/30">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Dibuat {{ $project->created_at->format('M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                    <button @click="openEditModal()" class="inline-flex items-center justify-center px-4 py-2 border-2 border-white/30 text-xs font-semibold rounded-xl text-white bg-white/10 backdrop-blur-sm hover:bg-white/20 transition-all duration-200 hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Proyek
                    </button>
                    @if($project->url)
                        <a href="{{ $project->url }}" target="_blank" rel="nofollow" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-xs font-semibold rounded-xl shadow-lg text-blue-700 bg-white hover:bg-gray-50 transition-all duration-200 hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Lihat Website
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 -mt-2 -mr-2 w-16 h-16 bg-white/10 rounded-full"></div>
        <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-20 h-20 bg-white/5 rounded-full"></div>
    </div>

    @if(session('success'))
        <div class="mb-8 relative">
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl shadow-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-white font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Project Information -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Proyek</h3>
                </div>
                <div class="px-6 py-4">
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Nama Website</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $project->website_name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">URL</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                @if($project->url)
                                    <a href="{{ $project->url }}" target="_blank" rel="nofollow" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                        {{ $project->url }}
                                    </a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status Proyek</dt>
                            <dd class="mt-1">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    @if($project->status == 'completed') bg-green-100 text-green-800
                                    @elseif($project->status == 'in_progress') bg-yellow-100 text-yellow-800
                                    @elseif($project->status == 'on_hold') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Harga</dt>
                            <dd class="mt-1 text-sm text-gray-900">Rp {{ number_format($project->price, 0, ',', '.') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Tanggal Pembayaran</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $project->payment_date ? $project->payment_date->format('d M Y') : '-' }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status Pembayaran</dt>
                            <dd class="mt-1">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    @if($project->payment_status == 'paid') bg-green-100 text-green-800
                                    @elseif($project->payment_status == 'pending') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($project->payment_status) }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status Paket</dt>
                            <dd class="mt-1">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $project->package_status_label }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Dibuat</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $project->created_at->format('d M Y H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Terakhir Diperbarui</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $project->updated_at->format('d M Y H:i') }}</dd>
                        </div>
                    </dl>
                    
                    @if($project->notes)
                        <div class="mt-6">
                            <dt class="text-sm font-medium text-gray-500">Catatan</dt>
                            <dd class="mt-1 text-sm text-gray-900 whitespace-pre-line">{{ $project->notes }}</dd>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Client Information & Expiry Status -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Client Information -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Client</h3>
                </div>
                <div class="px-6 py-4 space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nama</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <a href="{{ route('clients.show', $project->client) }}" class="text-indigo-600 hover:text-indigo-900">{{ $project->client->name }}</a>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $project->client->email }}" class="text-indigo-600 hover:text-indigo-900">{{ $project->client->email }}</a>
                        </dd>
                    </div>
                    @if($project->client->phone)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Telepon</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <a href="tel:{{ $project->client->phone }}" class="text-indigo-600 hover:text-indigo-900">{{ $project->client->phone }}</a>
                            </dd>
                        </div>
                    @endif
                    @if($project->client->address)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $project->client->address }}</dd>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Domain & Hosting Expiry -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Status Kadaluarsa</h3>
                </div>
                <div class="px-6 py-4 space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Domain</dt>
                        <dd class="mt-1">
                            @if($project->domain_expiry)
                                <div class="text-sm text-gray-900">{{ $project->domain_expiry->format('d M Y') }}</div>
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    @if($project->domain_expiry_status == 'expired') bg-red-100 text-red-800
                                    @elseif($project->domain_expiry_status == 'warning') bg-yellow-100 text-yellow-800
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ ucfirst($project->domain_expiry_status) }}
                                </span>
                                @if($project->domain_expiry_status == 'warning')
                                    <div class="text-xs text-yellow-600 mt-1">
                                        {{ $project->domain_expiry->diffInDays(now()) }} hari lagi
                                    </div>
                                @elseif($project->domain_expiry_status == 'expired')
                                    <div class="text-xs text-red-600 mt-1">
                                        Expired {{ $project->domain_expiry->diffForHumans() }}
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-400">Tidak diatur</span>
                            @endif
                        </dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Hosting</dt>
                        <dd class="mt-1">
                            @if($project->hosting_provider)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full border bg-gray-100 text-gray-800 border-gray-300">
                                    {{ $project->hosting_provider }}
                                </span>
                            @else
                                <span class="text-gray-400">Tidak diatur</span>
                            @endif
                        </dd>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Proyek -->
    <div x-show="showEditModal" 
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition ease-in duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>
        
        <!-- Modal container -->
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="showEditModal"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden">
                
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
                                class="text-white/80 hover:text-white p-2 rounded-lg hover:bg-white/10 transition-colors duration-200">
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
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editProjectModal', () => ({
        showEditModal: false,
        isSubmitting: false,
        showSuccess: false,
        
        openEditModal() {
            this.showEditModal = true;
            this.fillFormData();
        },
        
        closeEditModal() {
            this.showEditModal = false;
            this.isSubmitting = false;
            this.showSuccess = false;
        },
        
        fillFormData() {
            // Fill form with current project data
            this.$nextTick(() => {
                document.getElementById('edit_client_id').value = '{{ $project->client_id }}';
                document.getElementById('edit_website_name').value = '{{ $project->website_name }}';
                document.getElementById('edit_url').value = '{{ $project->url ?? '' }}';
                document.getElementById('edit_status').value = '{{ $project->status }}';
                document.getElementById('edit_domain_expiry').value = '{{ $project->domain_expiry ? $project->domain_expiry->format('Y-m-d') : '' }}';
                document.getElementById('edit_hosting_expiry').value = '{{ $project->hosting_expiry ? $project->hosting_expiry->format('Y-m-d') : '' }}';
                document.getElementById('edit_hosting_provider').value = '{{ $project->hosting_provider ?? '' }}';
                document.getElementById('edit_payment_date').value = '{{ $project->payment_date ? $project->payment_date->format('Y-m-d') : '' }}';
                document.getElementById('edit_payment_status').value = '{{ $project->payment_status }}';
                document.getElementById('edit_package_status').value = '{{ $project->package_status }}';
                document.getElementById('edit_notes').value = '{{ $project->notes ?? '' }}';
                
                // Format and set price
                const price = {{ $project->price ?? 0 }};
                if (price > 0) {
                    document.getElementById('edit_price_display').value = this.formatPrice(price);
                    document.getElementById('edit_price_raw').value = price;
                }
                
                // Setup price formatting
                this.setupPriceFormatting();
            });
        },
        
        setupPriceFormatting() {
            const priceDisplayInput = document.getElementById('edit_price_display');
            const priceRawInput = document.getElementById('edit_price_raw');
            
            if (priceDisplayInput && priceRawInput) {
                priceDisplayInput.addEventListener('input', (e) => {
                    let value = e.target.value.replace(/[^\d]/g, '');
                    if (value) {
                        e.target.value = this.formatPrice(parseInt(value));
                        priceRawInput.value = value;
                    } else {
                        e.target.value = '';
                        priceRawInput.value = '';
                    }
                });
            }
        },
        
        formatPrice(value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        },
        
        submitEditForm(event) {
            event.preventDefault();
            this.isSubmitting = true;
            
            const formData = new FormData(event.target);
            
            fetch('{{ route('projects.update', $project) }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.showSuccess = true;
                    setTimeout(() => {
                        this.closeEditModal();
                        // Reload page to show updated data
                        window.location.reload();
                    }, 2000);
                } else {
                    alert('Terjadi kesalahan saat memperbarui proyek');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memperbarui proyek');
            })
            .finally(() => {
                this.isSubmitting = false;
            });
        }
    }));
});
</script>
@endsection