@extends('layouts.app')

@section('title', 'Edit Proyek')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-gradient-to-r from-violet-600 via-indigo-600 to-blue-600 rounded-2xl shadow-2xl overflow-hidden">
                <div class="relative px-6 py-8">
                    <div class="absolute inset-0 bg-black/20 backdrop-blur-[4px]"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center shadow-lg border border-white/20">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight drop-shadow-md">Edit Proyek</h1>
                            <p class="text-white/80 text-sm mt-1">Perbarui informasi proyek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200/50 ring-1 ring-gray-100/50">
            <div class="p-6 sm:p-8 lg:p-10 bg-gradient-to-br from-white to-gray-50/80">
                <form action="{{ route('projects.update', $project) }}" method="POST" class="space-y-6 lg:space-y-8">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                        <div class="space-y-2">
                            <label for="client_id" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <span>Client <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="client_id" id="client_id" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white @error('client_id') border-red-500 @enderror">
                                    <option value="">Pilih Client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }}>
                                            {{ $client->name }} ({{ $client->email }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('client_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="website_name" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9 3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                </div>
                                <span>Nama Website <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <input type="text" name="website_name" id="website_name" value="{{ old('website_name', $project->website_name) }}" required
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white @error('website_name') border-red-500 @enderror">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('website_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
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
                                <input type="url" name="url" id="url" value="{{ old('url', $project->url) }}" placeholder="https://"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white @error('url') border-red-500 @enderror">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('url')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
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
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white @error('status') border-red-500 @enderror">
                                    <option value="">Pilih Status</option>
                                    <option value="planning" {{ old('status', $project->status) == 'planning' ? 'selected' : '' }}>Planning</option>
                                    <option value="in_progress" {{ old('status', $project->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="on_hold" {{ old('status', $project->status) == 'on_hold' ? 'selected' : '' }}>On Hold</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                        <div class="space-y-2">
                            <label for="domain_expiry" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Tanggal Kadaluarsa Domain</span>
                            </label>
                            <div class="relative group">
                                <input type="date" name="domain_expiry" id="domain_expiry" value="{{ old('domain_expiry', $project->domain_expiry?->format('Y-m-d')) }}"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white @error('domain_expiry') border-red-500 @enderror">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('domain_expiry')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="hosting_expiry" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Tanggal Kadaluarsa Hosting</span>
                            </label>
                            <div class="relative group">
                                <input type="date" name="hosting_expiry" id="hosting_expiry" value="{{ old('hosting_expiry', $project->hosting_expiry?->format('Y-m-d')) }}"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white @error('hosting_expiry') border-red-500 @enderror">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('hosting_expiry')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="hosting_provider" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                            <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                                </svg>
                            </div>
                            <span>Provider Hosting</span>
                        </label>
                        <div class="relative group">
                            <select name="hosting_provider" id="hosting_provider"
                                   class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white appearance-none @error('hosting_provider') border-red-500 @enderror">
                                <option value="">Pilih Provider Hosting</option>
                                <option value="Shared Hosting" {{ old('hosting_provider', $project->hosting_provider) == 'Shared Hosting' ? 'selected' : '' }}>Shared Hosting</option>
                                <option value="Cloud Server" {{ old('hosting_provider', $project->hosting_provider) == 'Cloud Server' ? 'selected' : '' }}>Cloud Server</option>
                                <option value="VPS Server" {{ old('hosting_provider', $project->hosting_provider) == 'VPS Server' ? 'selected' : '' }}>VPS Server</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </div>
                        </div>
                        @error('hosting_provider')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                        <div class="space-y-2">
                            <label for="price_display" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Harga (Rp) <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <input type="text" id="price_display" value="{{ old('price', $project->price) }}" required placeholder="0"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white @error('price') border-red-500 @enderror">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <input type="hidden" name="price" id="price" value="{{ old('price', $project->price) }}">
                            </div>
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="payment_date" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span>Tanggal Pembayaran</span>
                            </label>
                            <div class="relative group">
                                <input type="date" name="payment_date" id="payment_date" value="{{ old('payment_date', $project->payment_date?->format('Y-m-d')) }}"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white @error('payment_date') border-red-500 @enderror">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('payment_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="payment_status" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Status Pembayaran <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="payment_status" id="payment_status" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white appearance-none @error('payment_status') border-red-500 @enderror">
                                    <option value="">Pilih Status</option>
                                    <option value="pending" {{ old('payment_status', $project->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="paid" {{ old('payment_status', $project->payment_status) == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="overdue" {{ old('payment_status', $project->payment_status) == 'overdue' ? 'selected' : '' }}>Overdue</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('payment_status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="package_status" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                            <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <span>Status Paket <span class="text-red-500">*</span></span>
                        </label>
                        <div class="relative group">
                            <select name="package_status" id="package_status" required
                                    class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white appearance-none @error('package_status') border-red-500 @enderror">
                                <option value="">Pilih Paket</option>
                                <option value="website" {{ old('package_status', $project->package_status) == 'website' ? 'selected' : '' }}>Pembuatan Website</option>
                                <option value="maintenance" {{ old('package_status', $project->package_status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                <option value="seo" {{ old('package_status', $project->package_status) == 'seo' ? 'selected' : '' }}>SEO</option>
                                <option value="website_maintenance" {{ old('package_status', $project->package_status) == 'website_maintenance' ? 'selected' : '' }}>Pembuatan Website, Maintenance</option>
                                <option value="website_seo" {{ old('package_status', $project->package_status) == 'website_seo' ? 'selected' : '' }}>Pembuatan Website, SEO</option>
                                <option value="website_maintenance_seo" {{ old('package_status', $project->package_status) == 'website_maintenance_seo' ? 'selected' : '' }}>Pembuatan Website, Maintenance, SEO</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </div>
                        </div>
                        @error('package_status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="notes" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                            <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span>Catatan</span>
                        </label>
                        <div class="relative group">
                            <textarea name="notes" id="notes" rows="4" placeholder="Tambahkan catatan atau keterangan tambahan..."
                                      class="block w-full rounded-xl border-gray-300 pl-4 pr-4 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white resize-none @error('notes') border-red-500 @enderror">{{ old('notes', $project->notes) }}</textarea>
                        </div>
                        @error('notes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('projects.show', $project) }}" 
                           class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Perbarui Proyek
                        </button>
                    </div>
        </form>
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
    
    // Format existing value on page load
    if (priceDisplayInput.value) {
        const rawValue = getRawNumber(priceDisplayInput.value);
        priceDisplayInput.value = formatRupiah(priceDisplayInput.value);
        priceHiddenInput.value = rawValue;
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
@endsection