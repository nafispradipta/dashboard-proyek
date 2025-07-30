@extends('layouts.app')

@section('title', 'Daftar Client')

@section('content')
<div class="w-full content-container" x-data="{ 
    showModal: false,
    showEditModal: false,
    showDeleteModal: false,
    isSubmitting: false,
    showSuccess: false,
    editingClient: null,
    clientToDelete: null,
    submitForm(event) {
        event.preventDefault();
        this.isSubmitting = true;
        
        const formData = new FormData(event.target);
        
        fetch('{{ route('clients.store') }}', {
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
    },
    openEditModal(client) {
        this.editingClient = client;
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
                this.showDeleteModal = false;
                this.clientToDelete = null;
                window.location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus data');
        })
        .finally(() => {
            this.isSubmitting = false;
        });
    }
}">
    <!-- Page Header -->
    <div class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 rounded-2xl shadow-2xl mb-8">
        <!-- Animated background pattern -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 via-purple-600/20 to-pink-500/20 animate-pulse"></div>
        
        <!-- Floating decorative elements -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-white/20 to-white/5 rounded-full blur-xl transform translate-x-8 -translate-y-8 animate-bounce"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-white/15 to-white/5 rounded-full blur-lg transform -translate-x-6 translate-y-6 animate-pulse"></div>
        <div class="absolute top-1/2 right-1/4 w-16 h-16 bg-white/10 rounded-full blur-md animate-ping"></div>
        
        <!-- Geometric patterns -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#grid)" />
            </svg>
        </div>
        
        <div class="relative px-6 py-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                <div class="flex items-center space-x-5">
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-white/30 to-white/10 rounded-2xl flex items-center justify-center backdrop-blur-md border border-white/30 shadow-2xl transform hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-yellow-400 rounded-full animate-pulse"></div>
                    </div>
                    <div class="space-y-1">
                        <h1 class="text-2xl font-bold text-white drop-shadow-lg tracking-tight">Daftar Client</h1>
                        <p class="text-indigo-100 text-sm font-medium drop-shadow-sm">Kelola semua client Anda dengan mudah dan efisien</p>
                        <div class="flex items-center space-x-2 mt-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-xs text-indigo-200">{{ $clients->total() }} Total Client</span>
                        </div>
                    </div>
                </div>
                
                <div class="w-full lg:w-auto">
                    <button @click="showModal = true" class="group w-full lg:w-auto inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-white/25 to-white/15 backdrop-blur-md text-white font-semibold rounded-xl shadow-xl hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-white/30 transition-all duration-300 border border-white/30 hover:border-white/50 transform hover:scale-105 hover:-translate-y-1 active:scale-95 cursor-pointer">
                        <div class="flex items-center space-x-3">
                            <div class="w-5 h-5 bg-white/20 rounded-lg flex items-center justify-center group-hover:bg-white/30 transition-colors duration-200">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <span class="tracking-wide">Tambah Client</span>
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
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 via-indigo-50/30 to-purple-50/50"></div>
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-100/30 to-purple-100/20 rounded-full blur-2xl transform translate-x-16 -translate-y-16"></div>
        
        <div class="relative p-6">
            <form action="{{ route('clients.index') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="md:col-span-3">
                        <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">Pencarian Client</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none z-10">
                                <svg class="h-5 w-5 text-gray-600 group-focus-within:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" 
                                class="block w-full pl-10 pr-4 py-3.5 border border-gray-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 bg-white/80 backdrop-blur-sm text-gray-900 placeholder-gray-500 transition-all duration-200 hover:bg-white/90 focus:bg-white" 
                                placeholder="Cari client (nama, email, telepon)..." 
                                value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="flex flex-col justify-end">
                        <div class="flex items-center space-x-3">
                            <button type="submit" class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/30 transition-all duration-300 transform hover:scale-105 hover:-translate-y-0.5 cursor-pointer">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Cari
                            </button>
                            <a href="{{ route('clients.index') }}" class="inline-flex items-center justify-center px-4 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl bg-white/70 backdrop-blur-sm hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200/50 transition-all duration-200 transform hover:scale-105 cursor-pointer">
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

    <!-- Clients List -->
    <div class="relative overflow-hidden bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl border border-gray-200/50">
        <!-- Decorative background -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-50/30 via-blue-50/20 to-indigo-50/30"></div>
        <div class="absolute bottom-0 left-0 w-40 h-40 bg-gradient-to-tr from-indigo-100/20 to-purple-100/10 rounded-full blur-3xl transform -translate-x-20 translate-y-20"></div>
        <!-- Mobile view -->
        <div class="lg:hidden divide-y divide-gray-100/50 relative">
            @forelse($clients as $client)
                <div class="p-6 hover:bg-white/50 transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <a href="{{ route('clients.show', $client) }}" class="text-base font-semibold text-indigo-600 hover:text-indigo-800 transition-colors duration-200">{{ $client->name }}</a>
                            <p class="text-sm text-gray-600 mt-1">{{ $client->email }}</p>
                            @if($client->phone)
                                <p class="text-sm text-gray-500">{{ $client->phone }}</p>
                            @endif
                        </div>
                        <div class="text-sm text-gray-500">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 shadow-sm">
                                {{ $client->projects_count }} Proyek
                            </span>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end space-x-3 items-center">
                        <a href="{{ route('clients.show', $client) }}" class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-all duration-200 transform hover:scale-110" title="Lihat">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </a>
                        <button @click="openEditModal({{ $client }})" class="text-yellow-600 hover:text-yellow-800 p-2 rounded-lg hover:bg-yellow-50 transition-all duration-200 transform hover:scale-110 cursor-pointer" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </button>
                        <button @click="openDeleteModal({{ $client }})" class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-all duration-200 transform hover:scale-110 cursor-pointer" title="Hapus">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </div>
            @empty
                <div class="p-16 text-center relative">
                    <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada client</h3>
                    <p class="text-sm text-gray-500">Mulai dengan membuat client pertama Anda.</p>
                </div>
            @endforelse
        </div>

        <!-- Desktop view -->
        <div class="hidden lg:block relative">
            <!-- Horizontal scroll wrapper -->
            <div class="table-container overflow-x-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 hover:scrollbar-thumb-gray-400">
                <table class="min-w-full table-responsive">
                <thead class="bg-gradient-to-r from-gray-50/80 to-gray-100/60 backdrop-blur-sm border-b-2 border-gray-300">
                    <tr>
                        <th scope="col" class="px-8 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Nama</th>
                        <th scope="col" class="px-8 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Kontak</th>
                        <th scope="col" class="px-8 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Alamat</th>
                        <th scope="col" class="px-8 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Total Proyek</th>
                        <th scope="col" class="px-8 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white/50 backdrop-blur-sm relative">
                    @forelse ($clients as $client)
                        <tr class="hover:bg-white/70 transition-all duration-200 group border-b-2 border-gray-400 last:border-b-0">
                            <td class="px-8 py-4 whitespace-nowrap text-center">
                                <div class="text-sm font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors duration-200">
                                    {{ $client->name }}
                                </div>
                            </td>
                            <td class="px-8 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-700">{{ $client->email }}</div>
                                <div class="text-xs text-gray-500">{{ $client->phone }}</div>
                            </td>
                            <td class="px-8 py-4 text-center">
                                <div class="text-sm text-gray-700 max-w-xs truncate mx-auto">{{ $client->address }}</div>
                            </td>
                            <td class="px-8 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-800 border border-indigo-200">
                                    {{ $client->projects_count }} Proyek
                                </span>
                            </td>
                            <td class="px-8 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex items-center justify-center space-x-3">
                                    <a href="{{ route('clients.show', $client) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 hover:bg-indigo-50 p-2 rounded-lg transition-all duration-200 group/btn">
                                        <svg class="h-5 w-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <button @click="openEditModal({{ $client }})" 
                                       class="text-amber-600 hover:text-amber-900 hover:bg-amber-50 p-2 rounded-lg transition-all duration-200 group/btn cursor-pointer">
                                        <svg class="h-5 w-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button @click="openDeleteModal({{ $client }})" 
                                            class="text-red-600 hover:text-red-900 hover:bg-red-50 p-2 rounded-lg transition-all duration-200 group/btn cursor-pointer">
                                        <svg class="h-5 w-5 group-hover/btn:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-16 text-center text-gray-500 relative">
                                <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada client</h3>
                                <p class="text-sm text-gray-500">Tidak ada client yang cocok dengan pencarian Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>

        @if($clients->hasPages())
            <div class="px-8 py-4 mb-4 border-t border-gray-200/50 bg-gradient-to-r from-gray-50/50 to-gray-100/30 backdrop-blur-sm relative">
                {{ $clients->appends(request()->query())->links('custom.pagination') }}
            </div>
        @endif
    </div>

    <!-- Modal Popup for Add Client -->
    <div x-show="showModal" 
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition ease-in duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="showModal = false"></div>
        
        <!-- Modal container -->
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="showModal" 
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
                    <span class="font-medium">Client berhasil ditambahkan!</span>
                </div>
                
                <!-- Modal Header -->
                <div class="relative bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-800 px-6 py-4">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white">Tambah Client Baru</h3>
                        </div>
                        <button @click="showModal = false" class="text-white/80 hover:text-white hover:bg-white/20 rounded-lg p-2 transition-all duration-200 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Modal Body -->
                <div class="p-6">
                    <form @submit="submitForm" class="space-y-6">
                        @csrf
                        
                        <!-- Name Field -->
                        <div>
                            <label for="modal_name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Client *</label>
                            <input type="text" name="name" id="modal_name" required
                                   :disabled="isSubmitting"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 bg-gray-50/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                   placeholder="Masukkan nama client">
                        </div>
                        
                        <!-- Email Field -->
                        <div>
                            <label for="modal_email" class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" id="modal_email" required
                                   :disabled="isSubmitting"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 bg-gray-50/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                   placeholder="client@example.com">
                        </div>
                        
                        <!-- Phone Field -->
                        <div>
                            <label for="modal_phone" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" name="phone" id="modal_phone"
                                   :disabled="isSubmitting"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 bg-gray-50/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                   placeholder="08xxxxxxxxxx">
                        </div>
                        
                        <!-- Address Field -->
                        <div>
                            <label for="modal_address" class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                            <textarea name="address" id="modal_address" rows="3"
                                      :disabled="isSubmitting"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 bg-gray-50/50 transition-all duration-200 resize-none disabled:opacity-50 disabled:cursor-not-allowed"
                                      placeholder="Masukkan alamat lengkap client"></textarea>
                        </div>
                        
                        <!-- Notes Field -->
                        <div>
                            <label for="modal_notes" class="block text-sm font-semibold text-gray-700 mb-2">Catatan</label>
                            <textarea name="notes" id="modal_notes" rows="2"
                                      :disabled="isSubmitting"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 bg-gray-50/50 transition-all duration-200 resize-none disabled:opacity-50 disabled:cursor-not-allowed"
                                      placeholder="Catatan tambahan (opsional)"></textarea>
                        </div>
                        
                        <!-- Modal Footer -->
                        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                            <button type="button" @click="showModal = false" 
                                    :disabled="isSubmitting"
                                    class="px-6 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200/50 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                                Batal
                            </button>
                            <button type="submit" 
                                    :disabled="isSubmitting"
                                    class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/30 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none cursor-pointer">
                                <span x-show="!isSubmitting">Simpan Client</span>
                                <span x-show="isSubmitting">Menyimpan...</span>
                            </button>
                        </div>
                    </form>
                </div>
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
                    <form @submit="submitEditForm" class="space-y-6">
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
</div>
@endsection