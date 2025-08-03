@extends('layouts.app')

@section('title', 'Detail Client - ' . $client->name)

@section('content')
<div class="w-full content-container" x-data="{ 
    showEditModal: false,
    showDeleteModal: false,
    showProjectModal: false,
    isSubmitting: false,
    showSuccess: false,
    editingClient: null,
    clientToDelete: null,
    openEditModal(client) {
        console.log('Client object:', client);
        // Membuat objek client baru tanpa relasi projects
        this.editingClient = {
            id: client.id,
            name: client.name,
            email: client.email,
            phone: client.phone || '',
            address: client.address || '',
            notes: client.notes || ''
        };
        this.showEditModal = true;
        // Pre-fill form fields
        this.$nextTick(() => {
            document.getElementById('edit_modal_name').value = client.name;
            document.getElementById('edit_modal_email').value = client.email;
            document.getElementById('edit_modal_phone').value = client.phone || '';
            document.getElementById('edit_modal_address').value = client.address || '';
            document.getElementById('edit_modal_notes').value = client.notes || '';
        });
    },
    openDeleteModal(client) {
        this.clientToDelete = client;
        this.showDeleteModal = true;
    },
    deleteClient() {
        if (!this.clientToDelete) return;
        
        this.isSubmitting = true;
        
        const formData = new FormData();
        formData.append('_method', 'DELETE');
        
        fetch(`/clients/${this.clientToDelete.id}`, {
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
                window.location.href = '/clients';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus data');
        })
        .finally(() => {
            this.isSubmitting = false;
        });
    },
    submitEditForm(event) {
        event.preventDefault();
        this.isSubmitting = true;
        
        const formData = new FormData(event.target);
        formData.append('_method', 'PUT');
        
        fetch(`/clients/${this.editingClient.id}`, {
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
                setTimeout(() => {
                    this.showEditModal = false;
                    this.showSuccess = false;
                    this.editingClient = null;
                    window.location.reload();
                }, 1500);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengupdate data');
        })
        .finally(() => {
            this.isSubmitting = false;
        });
    },
    submitProjectForm(event) {
        event.preventDefault();
        this.isSubmitting = true;
        
        const formData = new FormData(event.target);
        
        fetch('{{ route("projects.store") }}', {
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
                    this.showProjectModal = false;
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
}" @open-project-modal.window="showProjectModal = true">
    <!-- Header Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 rounded-2xl shadow-2xl mb-8">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative px-6 py-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex items-center space-x-5">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 bg-white/30 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/30">
                                <span class="text-2xl font-bold text-white">{{ strtoupper(substr($client->name, 0, 2)) }}</span>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white mb-1">{{ $client->name }}</h1>
                            <p class="text-blue-100 text-sm font-medium">Detail informasi client</p>
                            <div class="flex items-center mt-2 space-x-2">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-white/20 text-white border border-white/30">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></svg>
                                    {{ $client->projects->count() }} Proyek
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-white/20 text-white border border-white/30">
                                    <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Bergabung {{ $client->created_at->format('M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 lg:mt-0 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                        <button type="button" @click="openEditModal({{ $client }})" class="inline-flex items-center justify-center px-4 py-2 border-2 border-white/30 text-xs font-semibold rounded-xl text-white bg-white/10 backdrop-blur-sm hover:bg-white/20 transition-all duration-200 hover:scale-105 cursor-pointer">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Client
                        </button>
                        <button @click="$dispatch('open-project-modal')" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-xs font-semibold rounded-xl shadow-lg text-blue-700 bg-white hover:bg-gray-50 transition-all duration-200 hover:scale-105 cursor-pointer">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Proyek
                        </button>
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

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Client Information -->
            <div class="lg:col-span-1">
                <div class="bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl border border-white/20 overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-700 px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="ml-3 text-lg font-bold text-white">Informasi Client</h3>
                        </div>
                    </div>
                    <div class="px-6 py-6 space-y-4">
                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Nama</dt>
                            <dd class="text-sm font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2 border border-gray-200">{{ $client->name }}</dd>
                        </div>
                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Email</dt>
                            <dd class="text-sm font-medium bg-gray-50 rounded-lg px-3 py-2 border border-gray-200">
                                <a href="mailto:{{ $client->email }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-200 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $client->email }}
                                </a>
                            </dd>
                        </div>
                        @if($client->phone)
                            <div class="group">
                                <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Telepon</dt>
                                <dd class="text-sm font-medium bg-gray-50 rounded-lg px-3 py-2 border border-gray-200">
                                    <a href="tel:{{ $client->phone }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-200 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        {{ $client->phone }}
                                    </a>
                                </dd>
                            </div>
                        @endif
                        @if($client->address)
                            <div class="group">
                                <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Alamat</dt>
                                <dd class="text-sm font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2 border border-gray-200 flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>{{ $client->address }}</span>
                                </dd>
                            </div>
                        @endif
                        @if($client->notes)
                            <div class="group">
                                <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Catatan</dt>
                                <dd class="text-sm font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2 border border-gray-200 flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span>{{ $client->notes }}</span>
                                </dd>
                            </div>
                        @endif
                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Bergabung</dt>
                            <dd class="text-sm font-medium text-gray-900 bg-gray-50 rounded-lg px-3 py-2 border border-gray-200 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $client->created_at->format('d M Y') }}
                            </dd>
                        </div>
                    </div>
                    
                    <!-- Tombol Hapus Client -->
                    <div class="mt-6 mb-4 flex justify-end pr-4">
                        <button @click="openDeleteModal({{ $client }})" 
                                class="inline-flex items-center px-3 py-1.5 text-sm bg-gradient-to-r from-red-600 to-red-700 text-white font-medium rounded-lg shadow hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-red-500/30 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus Client
                        </button>
                    </div>
                </div>
            </div>

            <!-- Projects List -->
            <div class="lg:col-span-3">
                <div class="bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl border border-white/20 overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h3 class="ml-3 text-lg font-bold text-white">Proyek ({{ $client->projects->count() }})</h3>
                        </div>
                    </div>
                    
                    @if($client->projects->count() > 0)
                        <div class="overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                        <tr>
                                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Nama Proyek</th>
                                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Domain</th>
                                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Hosting</th>
                                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Pembayaran</th>
                                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($client->projects as $project)
                                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <div class="text-sm font-semibold text-gray-900">{{ $project->website_name }}</div>
                                                    @if($project->url)
                                                        <div class="text-xs text-blue-600 hover:text-blue-800 mt-1">
                                                            <a href="{{ $project->url }}" target="_blank" rel="nofollow" class="hover:underline">
                                                                {{ $project->url }}
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full 
                                                        @if($project->status == 'completed') bg-green-100 text-green-800
                                                        @elseif($project->status == 'in_progress') bg-yellow-100 text-yellow-800
                                                        @elseif($project->status == 'on_hold') bg-red-100 text-red-800
                                                        @else bg-gray-100 text-gray-800 @endif">
                                                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    @if($project->domain_expiry)
                                                        <div class="text-sm font-medium text-gray-900">{{ $project->domain_expiry->format('d/m/Y') }}</div>
                                                    @else
                                                        <span class="text-gray-400 text-sm">-</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    @if($project->hosting_expiry)
                                                        <div class="text-sm font-medium text-gray-900">{{ $project->hosting_expiry->format('d/m/Y') }}</div>
                                                    @else
                                                        <span class="text-gray-400 text-sm">-</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full 
                                                        @if($project->payment_status == 'paid') bg-green-100 text-green-800
                                                        @elseif($project->payment_status == 'pending') bg-yellow-100 text-yellow-800
                                                        @else bg-red-100 text-red-800 @endif">
                                                        {{ ucfirst($project->payment_status) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <div class="flex items-center justify-center">
                                                        <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center justify-center px-4 py-1.5 bg-blue-600 text-white text-xs font-medium rounded-lg shadow-md hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 cursor-pointer">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="px-6 py-12 text-center">
                            <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada proyek</h3>
                            <p class="text-gray-500 mb-6 max-w-md mx-auto text-sm">Mulai dengan membuat proyek pertama untuk client ini dan kelola semua informasi proyek dengan mudah.</p>
                            <a href="{{ route('projects.create', ['client_id' => $client->id]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-semibold rounded-lg shadow-lg text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 hover:scale-105">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Proyek
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    
    <!-- Modal Popup for Edit Client -->
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
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="showEditModal = false"></div>
        
        <!-- Modal container -->
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="showEditModal" 
                 x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-200" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden">
                
                <!-- Success Message -->
                <div x-show="showSuccess" 
                     x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="opacity-0 -translate-y-2" 
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute top-4 left-4 right-4 z-10 bg-green-500 text-white px-4 py-3 rounded-xl shadow-lg flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium">Client berhasil diupdate!</span>
                </div>
                
                <!-- Modal Header -->
                <div class="relative bg-gradient-to-r from-amber-600 via-orange-600 to-amber-800 px-6 py-4">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Edit Client</h3>
                        </div>
                        <button @click="showEditModal = false" class="text-white/80 hover:text-white hover:bg-white/20 rounded-lg p-2 transition-all duration-200 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Modal Body -->
                <div class="p-6">
                    <form @submit.prevent="submitEditForm" class="space-y-6">
                        @csrf
                        
                        <!-- Name Field -->
                        <div>
                            <label for="edit_modal_name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Client *</label>
                            <input type="text" name="name" id="edit_modal_name" required
                                   :disabled="isSubmitting"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 bg-gray-50/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                   placeholder="Masukkan nama client">
                        </div>
                        
                        <!-- Email Field -->
                        <div>
                            <label for="edit_modal_email" class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" id="edit_modal_email" required
                                   :disabled="isSubmitting"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 bg-gray-50/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                   placeholder="client@example.com">
                        </div>
                        
                        <!-- Phone Field -->
                        <div>
                            <label for="edit_modal_phone" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" name="phone" id="edit_modal_phone"
                                   :disabled="isSubmitting"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 bg-gray-50/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                   placeholder="08xxxxxxxxxx">
                        </div>
                        
                        <!-- Address Field -->
                        <div>
                            <label for="edit_modal_address" class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                            <textarea name="address" id="edit_modal_address" rows="3"
                                      :disabled="isSubmitting"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 bg-gray-50/50 transition-all duration-200 resize-none disabled:opacity-50 disabled:cursor-not-allowed"
                                      placeholder="Masukkan alamat lengkap client"></textarea>
                        </div>
                        
                        <!-- Notes Field -->
                        <div>
                            <label for="edit_modal_notes" class="block text-sm font-semibold text-gray-700 mb-2">Catatan</label>
                            <textarea name="notes" id="edit_modal_notes" rows="2"
                                      :disabled="isSubmitting"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 bg-gray-50/50 transition-all duration-200 resize-none disabled:opacity-50 disabled:cursor-not-allowed"
                                      placeholder="Catatan tambahan (opsional)"></textarea>
                        </div>
                        
                        <!-- Modal Footer -->
                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                            <button type="button" @click="showEditModal = false" 
                                    :disabled="isSubmitting"
                                    class="px-6 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                                Batal
                            </button>
                            <button type="submit" 
                                    :disabled="isSubmitting"
                                    class="px-6 py-2.5 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-amber-500/30 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none cursor-pointer">
                                <span x-show="!isSubmitting">Update Client</span>
                                <span x-show="isSubmitting">Mengupdate...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Popup for Delete Confirmation -->
    <div x-show="showDeleteModal" 
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition ease-in duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="showDeleteModal = false"></div>
        
        <!-- Modal container -->
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="showDeleteModal" 
                 x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-200" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden">
                
                <!-- Modal Header -->
                <div class="relative bg-gradient-to-r from-red-600 via-red-500 to-red-700 px-6 py-4">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Konfirmasi Hapus</h3>
                        </div>
                        <button @click="showDeleteModal = false" class="text-white/80 hover:text-white hover:bg-white/20 rounded-lg p-2 transition-all duration-200 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Modal Body -->
                <div class="p-6">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Apakah Anda yakin?</h3>
                        <p class="text-gray-600 mb-0" x-text="clientToDelete ? `Anda akan menghapus client '${clientToDelete.name}' beserta semua data terkait.` : 'Anda akan menghapus client ini beserta semua data terkait.'"></p>
                        <p class="text-gray-500 text-sm mt-2">Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    
                    <!-- Modal Footer -->
                    <div class="flex items-center justify-center space-x-3 pt-4">
                        <button type="button" @click="showDeleteModal = false" 
                                :disabled="isSubmitting"
                                class="px-6 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                            Batal
                        </button>
                        <button type="button" @click="deleteClient()" 
                                :disabled="isSubmitting"
                                class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-red-500/30 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none cursor-pointer">
                            <span x-show="!isSubmitting">Ya, Hapus</span>
                            <span x-show="isSubmitting">Menghapus...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Proyek -->
    <div x-cloak x-show="showProjectModal" 
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition ease-in duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto">
        
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-black/70 backdrop-blur-md" @click="showProjectModal = false"></div>
        
        <!-- Modal container -->
        <div class="flex min-h-full items-center justify-center p-2 sm:p-4">
            <div x-show="showProjectModal" 
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
                <div class="relative bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
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
                        <button @click="showProjectModal = false" class="text-white/80 hover:text-white hover:bg-white/20 rounded-lg p-2 sm:p-2.5 transition-all duration-200 cursor-pointer">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-4 sm:p-6 lg:p-10 bg-gradient-to-br from-white to-gray-50/80">
                    <form @submit="submitProjectForm" class="space-y-4 sm:space-y-6 lg:space-y-8">
                    @csrf
                    
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
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
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
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

                        <div class="space-y-2">
                            <label for="payment_status" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Status Pembayaran <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="payment_status" id="payment_status" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                    <option value="">Pilih Status Pembayaran</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="overdue">Overdue</option>
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
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-4 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
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
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-4 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
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
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-4 py-3 sm:py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
                        <div class="space-y-2">
                            <label for="package_status" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                <span>Paket <span class="text-red-500">*</span></span>
                            </label>
                            <div class="relative group">
                                <select name="package_status" id="package_status" required
                                        class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                    <option value="">Pilih Paket</option>
                                    <option value="website">Website</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="seo">SEO</option>
                                    <option value="website_maintenance">Website + Maintenance</option>
                                    <option value="website_seo">Website + SEO</option>
                                    <option value="website_maintenance_seo">Website + Maintenance + SEO</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="price_display" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Harga (Rp)</span>
                            </label>
                            <div class="relative group">
                                <input type="text" id="price_display" placeholder="0"
                                       class="block w-full rounded-xl border-gray-300 pl-4 pr-10 py-3.5 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-hover:text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <input type="hidden" name="price" id="price">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="notes" class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                            <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <span>Catatan</span>
                        </label>
                        <textarea name="notes" id="notes" rows="3" 
                                  class="block w-full rounded-xl border-gray-300 pl-4 pr-4 py-3 text-gray-700 bg-white/50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200 hover:bg-white hover:border-indigo-300 focus:bg-white"></textarea>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" @click="showProjectModal = false" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-400/50">
                            Batal
                        </button>
                        <button type="submit" :disabled="isSubmitting" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:scale-100">
                            <span x-show="!isSubmitting">Simpan Proyek</span>
                            <span x-show="isSubmitting" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const priceDisplayInput = document.getElementById('price_display');
    const priceHiddenInput = document.getElementById('price');
    
    if (priceDisplayInput && priceHiddenInput) {
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
    }
});
</script>

@endsection