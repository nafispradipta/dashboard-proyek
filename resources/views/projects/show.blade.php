@extends('layouts.app')

@section('title', 'Detail Proyek - ' . $project->website_name)

@section('content')
<div class="w-full">
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
                    <a href="{{ route('projects.edit', $project) }}" class="inline-flex items-center justify-center px-4 py-2 border-2 border-white/30 text-xs font-semibold rounded-xl text-white bg-white/10 backdrop-blur-sm hover:bg-white/20 transition-all duration-200 hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Proyek
                    </a>
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
</div>
@endsection