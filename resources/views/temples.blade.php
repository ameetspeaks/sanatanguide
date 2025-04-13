<x-app-layout>
    <div class="py-12 bg-saffron-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-saffron-900">Temple Directory</h1>
                <div class="flex space-x-4">
                    <div class="relative">
                        <input type="text" 
                               class="w-64 pl-10 pr-4 py-2 border border-saffron-300 rounded-lg focus:ring-saffron-500 focus:border-saffron-500" 
                               placeholder="Search temples...">
                        <div class="absolute left-3 top-2.5">
                            <svg class="h-5 w-5 text-saffron-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                    <select class="border border-saffron-300 rounded-lg px-4 py-2 focus:ring-saffron-500 focus:border-saffron-500">
                        <option value="">All States</option>
                        <option value="maharashtra">Maharashtra</option>
                        <option value="gujarat">Gujarat</option>
                        <option value="tamil-nadu">Tamil Nadu</option>
                        <!-- Add more states -->
                    </select>
                </div>
            </div>

            <!-- Featured Temples -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-saffron-800 mb-6">Featured Temples</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Temple Card -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('images/temples/kedarnath.jpg') }}" alt="Kedarnath Temple" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-saffron-900 mb-2">Kedarnath Temple</h3>
                            <p class="text-gray-600 mb-4">Kedarnath, Uttarakhand</p>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg class="h-5 w-5 text-saffron-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Open: 6:00 AM - 7:00 PM</span>
                            </div>
                            <a href="#" class="inline-flex items-center text-saffron-600 hover:text-saffron-800">
                                View Details
                                <svg class="h-5 w-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Add more temple cards -->
                </div>
            </div>

            <!-- Temple List -->
            <div>
                <h2 class="text-2xl font-semibold text-saffron-800 mb-6">All Temples</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Temple List Item -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-saffron-900 mb-2">Somnath Temple</h3>
                        <p class="text-gray-600 mb-4">Gir Somnath, Gujarat</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Distance: 1200 km</span>
                            <a href="#" class="text-saffron-600 hover:text-saffron-800">More Info →</a>
                        </div>
                    </div>

                    <!-- Add more temple list items -->
                </div>
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