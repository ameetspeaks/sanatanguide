<x-app-layout>
    <div class="py-12 bg-saffron-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-saffron-900">Puja Guide</h1>
                <div class="relative">
                    <input type="text" 
                           class="w-64 pl-10 pr-4 py-2 border border-saffron-300 rounded-lg focus:ring-saffron-500 focus:border-saffron-500" 
                           placeholder="Search pujas...">
                    <div class="absolute left-3 top-2.5">
                        <svg class="h-5 w-5 text-saffron-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <button class="p-4 bg-white rounded-lg shadow text-center hover:bg-saffron-50 focus:ring-2 focus:ring-saffron-500">
                    <span class="block text-saffron-900 font-medium">Daily Pujas</span>
                </button>
                <button class="p-4 bg-white rounded-lg shadow text-center hover:bg-saffron-50 focus:ring-2 focus:ring-saffron-500">
                    <span class="block text-saffron-900 font-medium">Festival Pujas</span>
                </button>
                <button class="p-4 bg-white rounded-lg shadow text-center hover:bg-saffron-50 focus:ring-2 focus:ring-saffron-500">
                    <span class="block text-saffron-900 font-medium">Special Occasions</span>
                </button>
                <button class="p-4 bg-white rounded-lg shadow text-center hover:bg-saffron-50 focus:ring-2 focus:ring-saffron-500">
                    <span class="block text-saffron-900 font-medium">Deity-specific</span>
                </button>
            </div>

            <!-- Featured Puja -->
            <div class="bg-white rounded-lg shadow-xl overflow-hidden mb-8">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{ asset('images/pujas/satyanarayan.jpg') }}" alt="Satyanarayan Puja">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-saffron-500 font-semibold">Featured Puja</div>
                        <h2 class="mt-2 text-2xl font-semibold text-saffron-900">Satyanarayan Puja</h2>
                        <p class="mt-4 text-gray-600">A sacred ritual dedicated to Lord Vishnu, performed for wish fulfillment and prosperity.</p>
                        <div class="mt-4">
                            <a href="#" class="inline-flex items-center text-saffron-600 hover:text-saffron-800">
                                Learn More
                                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Puja List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Puja Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-saffron-900 mb-2">Ganesh Puja</h3>
                        <p class="text-gray-600 mb-4">Ritual worship of Lord Ganesha, the remover of obstacles.</p>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm">
                                <svg class="h-5 w-5 text-saffron-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-gray-600">Duration: 1-2 hours</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <svg class="h-5 w-5 text-saffron-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-gray-600">Difficulty: Easy</span>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center text-saffron-600 hover:text-saffron-800">
                            View Details
                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Add more puja cards -->
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-saffron-300 bg-white text-sm font-medium text-saffron-500 hover:bg-saffron-50">
                        Previous
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-saffron-300 bg-white text-sm font-medium text-saffron-700 hover:bg-saffron-50">1</a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-saffron-300 bg-saffron-50 text-sm font-medium text-saffron-600">2</a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-saffron-300 bg-white text-sm font-medium text-saffron-700 hover:bg-saffron-50">3</a>
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-saffron-300 bg-white text-sm font-medium text-saffron-500 hover:bg-saffron-50">
                        Next
                    </a>
                </nav>
            </div>
        </div>
    </div>
</x-app-layout> 