@extends('layouts.guest')

@section('title', 'Login - Dashboard Manajemen Client')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 login-container">
    <div class="flex w-full max-w-6xl mx-auto overflow-hidden rounded-xl shadow-lg bg-white">
        <!-- Form Login (Kiri) -->
        <div class="w-full md:w-1/2 p-8 md:p-12">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang</h2>
                <p class="text-gray-600">Masuk ke sistem manajemen client & proyek website</p>
            </div>
            
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="login" class="block text-sm font-medium text-gray-700 mb-1">Username atau Email</label>
                        <input id="login" name="login" type="text" autocomplete="username" required 
                               class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm @error('login') border-red-500 @enderror" 
                               placeholder="Masukkan username atau email" value="{{ old('login') }}">
                        @error('login')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                               class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm @error('password') border-red-500 @enderror" 
                               placeholder="Masukkan password">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                @if ($errors->has('login'))
                    <div class="rounded-md bg-red-50 p-4">
                        <div class="text-sm text-red-700">
                            {{ $errors->first('login') }}
                        </div>
                    </div>
                @endif

                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Ingat saya
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out shadow-md">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Ilustrasi dan Teks Promosi (Kanan) -->
        <div class="hidden md:block md:w-1/2 bg-gradient-to-br from-blue-500 to-blue-700 p-12 text-white flex flex-col justify-center">
            <div class="mb-8">
                <h3 class="text-2xl font-bold mb-4">Kelola Proyek dan Client Anda Dengan Mudah</h3>
                <p class="text-blue-100">Masuk ke sistem manajemen client & proyek website untuk mengakses semua fitur dan kemudahan pengelolaan bisnis Anda.</p>
            </div>
            
            <!-- Dashboard Mockup/Illustration -->
            <div class="bg-white/10 p-4 rounded-lg shadow-lg">
                <div class="bg-white/10 rounded-lg p-3 mb-3"></div>
                <div class="flex space-x-2 mb-4">
                    <div class="h-20 bg-white/10 rounded-lg w-1/2"></div>
                    <div class="h-20 bg-white/10 rounded-lg w-1/2"></div>
                </div>
                <div class="h-32 bg-white/10 rounded-lg mb-3"></div>
                <div class="flex space-x-2">
                    <div class="h-10 bg-white/10 rounded-lg w-1/3"></div>
                    <div class="h-10 bg-white/10 rounded-lg w-1/3"></div>
                    <div class="h-10 bg-white/10 rounded-lg w-1/3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection