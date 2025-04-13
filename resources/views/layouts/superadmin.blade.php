<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SanatanGuide') }} - SuperAdmin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white transition-transform duration-300 transform" id="sidebar">
            <div class="flex items-center justify-between h-16 px-4 bg-gray-900">
                <span class="text-xl font-semibold">Sanatan Guide</span>
                <button class="lg:hidden" id="sidebarToggle">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav class="mt-5 px-2">
                <div class="space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('superadmin.dashboard') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.dashboard') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>

                    <!-- Temples Management -->
                    <a href="{{ route('superadmin.temples.index') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.temples.*') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Temples
                    </a>

                    <!-- Pujas Management -->
                    <a href="{{ route('superadmin.pujas.index') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.pujas.*') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Pujas
                    </a>

                    <!-- Meditations Management -->
                    <a href="{{ route('superadmin.meditations.index') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.meditations.*') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Meditations
                    </a>

                    <!-- Scriptures Management -->
                    <a href="{{ route('superadmin.scriptures.index') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.scriptures.*') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Scriptures
                    </a>

                    <!-- Blogs Management -->
                    <a href="{{ route('superadmin.blogs.index') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.blogs.*') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        Blogs
                    </a>

                    <!-- Daily Wisdom -->
                    <a href="{{ route('superadmin.daily-wisdoms.index') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.daily-wisdoms.*') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        Daily Wisdom
                    </a>

                    <!-- Festivals -->
                    <a href="{{ route('superadmin.festivals.index') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.festivals.*') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        Festivals
                    </a>

                    <!-- Users Management -->
                    <a href="{{ route('superadmin.users.index') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.users.*') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Users
                    </a>

                    <!-- Settings -->
                    <a href="{{ route('superadmin.settings') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150 {{ request()->routeIs('superadmin.settings') ? 'bg-gray-700' : '' }}">
                        <svg class="mr-4 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="lg:pl-64 flex flex-col flex-1">
            <!-- Top Navigation -->
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 lg:hidden" id="mobileSidebarToggle">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex">
                        <!-- Search bar can be added here -->
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:shadow-outline" id="user-menu-button">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" alt="{{ Auth::user()->name }}">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 pb-8">
                @yield('content')
            </main>
        </div>
    </div>

    @push('scripts')
    <script>
        // Toggle sidebar on mobile
        document.getElementById('mobileSidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileToggle = document.getElementById('mobileSidebarToggle');
            
            if (window.innerWidth < 1024 && 
                !sidebar.contains(event.target) && 
                !mobileToggle.contains(event.target) &&
                !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
    @endpush
</body>
</html> 