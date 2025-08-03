<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', isset($appSettings['app_name']) ? $appSettings['app_name'] : 'Dashboard Manajemen Client')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @if(isset($appSettings['favicon']))
    <link rel="icon" href="{{ asset('storage/' . $appSettings['favicon']) }}" type="image/x-icon">
    @endif
    
    <style>
        [x-cloak] { display: none !important; }
        
        /* Custom theme colors */
        :root {
            --color-primary: {{ isset($appSettings['primary_color']) ? $appSettings['primary_color'] : '#6366f1' }};
            --color-secondary: {{ isset($appSettings['secondary_color']) ? $appSettings['secondary_color'] : '#8b5cf6' }};
            --color-accent: {{ isset($appSettings['accent_color']) ? $appSettings['accent_color'] : '#ec4899' }};
        }
        
        .bg-gradient-primary {
            background-image: linear-gradient(to right, var(--color-primary), var(--color-secondary));
        }
        
        .from-primary {
            --tw-gradient-from: var(--color-primary);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(99, 102, 241, 0));
        }
        
        .to-secondary {
            --tw-gradient-to: var(--color-secondary);
        }
        
        .text-primary {
            color: var(--color-primary);
        }
        
        .border-primary {
            border-color: var(--color-primary);
        }
        
        .ring-primary {
            --tw-ring-color: var(--color-primary);
        }
        
        .bg-gradient-to-r.from-purple-500.to-indigo-600 {
            background-image: linear-gradient(to right, var(--color-primary), var(--color-secondary));
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div x-data="{ sidebarOpen: false }" class="relative min-h-screen bg-gray-200 lg:grid lg:grid-cols-[15%_85%]">
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black opacity-50 lg:hidden"></div>
        @auth
            <!-- Sidebar -->
            <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 transition duration-300 ease-in-out transform bg-white shadow-lg lg:translate-x-0 lg:static lg:w-full lg:h-screen lg:sticky lg:top-0 flex flex-col">
                <div class="p-4 bg-white border-b border-gray-200 flex-shrink-0">
                    <div class="flex items-center mb-2">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center w-8 h-8 text-white bg-blue-600 rounded-md">
                                <span class="text-sm font-bold">CM</span>
                            </span>
                        </div>
                        <div class="ml-3 flex-1">
                            <h1 class="text-base font-semibold text-gray-900 leading-tight">Client Manager</h1>
                            <p class="text-sm text-gray-500 leading-tight">Dashboard</p>
                        </div>
                    </div>
                </div>

                <nav class="flex-1 overflow-y-auto pt-4 px-2 pb-4 flex flex-col min-h-0">
                    <div class="flex-1">
                        <a href="{{ route('dashboard') }}" @class(['flex items-center px-3 py-2 rounded-md text-sm font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500', 'bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-medium' => request()->routeIs('dashboard'), 'text-gray-700 hover:bg-gray-200' => !request()->routeIs('dashboard')])>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span class="ml-2">Dashboard</span>
                        </a>
                        <a href="{{ route('clients.index') }}" @class(['flex items-center justify-between px-3 py-2 mt-2 rounded-md text-sm font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500', 'bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-medium' => request()->routeIs('clients.*'), 'text-gray-700 hover:bg-gray-200' => !request()->routeIs('clients.*')])>
                            <div class="flex items-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.124-1.28-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.124-1.28.356-1.857m0 0a5.002 5.002 0 019.288 0M12 14a4 4 0 100-8 4 4 0 000 8z"></path></svg>
                                <span class="ml-2">Client</span>
                            </div>
                            <span @class(['px-2 py-1 text-xs font-semibold rounded-full', 'bg-white/20 text-white' => request()->routeIs('clients.*'), 'bg-gray-200 text-gray-700' => !request()->routeIs('clients.*')])>{{ App\Models\Client::count() }}</span>
                        </a>
                        <a href="{{ route('projects.index') }}" @class(['flex items-center justify-between px-3 py-2 mt-2 rounded-md text-sm font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500', 'bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-medium' => request()->routeIs('projects.*'), 'text-gray-700 hover:bg-gray-200' => !request()->routeIs('projects.*')])>
                            <div class="flex items-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                                <span class="ml-2">Proyek</span>
                            </div>
                            <span @class(['px-2 py-1 text-xs font-semibold rounded-full', 'bg-white/20 text-white' => request()->routeIs('projects.*'), 'bg-gray-200 text-gray-700' => !request()->routeIs('projects.*')])>{{ App\Models\Project::count() }}</span>
                        </a>
                        <a href="{{ route('settings.index') }}" @class(['flex items-center px-3 py-2 mt-2 rounded-md text-sm font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500', 'bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-medium' => request()->routeIs('settings.*'), 'text-gray-700 hover:bg-gray-200' => !request()->routeIs('settings.*')])>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="ml-2">Settings</span>
                        </a>
                    </div>
                    
                    <!-- User Profile Section di akhir navbar -->
                    <div class="mt-auto pt-4 border-t border-gray-200">
                        <div class="flex items-center space-x-3 bg-gray-100 rounded-lg p-3 mx-1">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-full">
                                    <span class="text-sm font-bold text-white">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-medium text-gray-800 truncate">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="p-2 text-gray-500 rounded-md hover:bg-gray-200 focus:outline-none cursor-pointer">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    </button>
                            </form>
                        </div>
                    </div>
                </nav>

            </aside>

            <!-- Main Content Area -->
            <div class="min-h-screen flex flex-col lg:w-full">
                <header class="flex items-center justify-between p-4 bg-white border-b lg:hidden">
                    <button @click="sidebarOpen = true" class="p-1 text-gray-500 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>

                    <h1 class="text-xl font-bold text-gray-800">@yield('title')</h1>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-700 focus:outline-none cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                </header>

                <main class="flex-1 bg-gray-100 overflow-y-auto main-content-wrapper">
                    <div class="w-full px-6 py-6 sm:px-8 max-w-full">
                        @yield('content')
                    </div>
                </main>
            </div>
        @endauth

        @guest
            <div class="w-full">
                @yield('content')
            </div>
        @endguest
    </div>
</body>
</html>