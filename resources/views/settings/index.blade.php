@extends('layouts.app')

@section('title', 'Pengaturan')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Pengaturan</h1>
        
        @if (session('success'))
            <div class="mt-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6 bg-white rounded-xl shadow-sm overflow-hidden">

        <!-- Content -->
        <div class="p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="inline-block w-8 h-8 rounded-full bg-gradient-to-r from-primary to-secondary text-white flex items-center justify-center mr-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </span>
                    Pengaturan Profil
                </h2>
                <form action="{{ route('settings.update.general') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="bg-gray-50/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <h3 class="text-md font-medium text-gray-700 mb-4">Informasi Dasar</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="group">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-primary transition-colors duration-200">Nama</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" required
                                        class="block w-full pl-10 pr-3 py-3 rounded-xl border-gray-200 bg-white/70 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 focus:ring-opacity-50 sm:text-sm transition-all duration-200">
                                </div>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Username -->
                            <div class="group">
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-primary transition-colors duration-200">Username</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="username" id="username" value="{{ auth()->user()->username }}" required
                                        class="block w-full pl-10 pr-3 py-3 rounded-xl border-gray-200 bg-white/70 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 focus:ring-opacity-50 sm:text-sm transition-all duration-200">
                                </div>
                                @error('username')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="group">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-primary transition-colors duration-200">Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" required
                                        class="block w-full pl-10 pr-3 py-3 rounded-xl border-gray-200 bg-white/70 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 focus:ring-opacity-50 sm:text-sm transition-all duration-200">
                                </div>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <h3 class="text-md font-medium text-gray-700 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Ubah Password
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Current Password -->
                            <div class="group">
                                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-primary transition-colors duration-200">Password Saat Ini</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="current_password" id="current_password"
                                        class="block w-full pl-10 pr-3 py-3 rounded-xl border-gray-200 bg-white/70 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 focus:ring-opacity-50 sm:text-sm transition-all duration-200">
                                </div>
                                @error('current_password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div class="group">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-primary transition-colors duration-200">Password Baru</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password"
                                        class="block w-full pl-10 pr-3 py-3 rounded-xl border-gray-200 bg-white/70 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 focus:ring-opacity-50 sm:text-sm transition-all duration-200">
                                </div>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="group">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-primary transition-colors duration-200">Konfirmasi Password Baru</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="block w-full pl-10 pr-3 py-3 rounded-xl border-gray-200 bg-white/70 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 focus:ring-opacity-50 sm:text-sm transition-all duration-200">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-primary to-secondary text-white font-medium rounded-xl shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection