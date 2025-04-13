<x-app-layout>
    <div class="py-12 bg-saffron-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-saffron-900 mb-4">Hindu Festivals</h1>
                <p class="text-lg text-gray-600">Discover the rich traditions and celebrations of Hindu festivals</p>
            </div>

            <!-- Upcoming Festivals -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-saffron-800 mb-6">Upcoming Festivals</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Festival Card -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="relative">
                            <img src="{{ asset('images/festivals/diwali.jpg') }}" alt="Diwali" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4 bg-saffron-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                Coming Soon
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-saffron-900 mb-2">Diwali</h3>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg class="h-5 w-5 text-saffron-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>November 12, 2024</span>
                            </div>
                            <p class="text-gray-600 mb-4">Festival of lights celebrating the victory of light over darkness.</p>
                            <a href="#" class="inline-flex items-center text-saffron-600 hover:text-saffron-800">
                                Learn More
                                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Add more upcoming festival cards -->
                </div>
            </div>

            <!-- Festival Calendar -->
            <div class="bg-white rounded-lg shadow-xl p-6 mb-12">
                <h2 class="text-2xl font-semibold text-saffron-800 mb-6">Festival Calendar</h2>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <!-- Month Column -->
                    <div class="md:col-span-3 bg-saffron-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-saffron-900 mb-4">April 2024</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <span class="w-8 text-saffron-600 font-medium">09</span>
                                <span class="text-gray-700">Ram Navami</span>
                            </li>
                            <li class="flex items-center">
                                <span class="w-8 text-saffron-600 font-medium">14</span>
                                <span class="text-gray-700">Baisakhi</span>
                            </li>
                            <!-- Add more dates -->
                        </ul>
                    </div>
                    <!-- Add more month columns -->
                </div>
            </div>

            <!-- Festival Categories -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Category Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-saffron-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-saffron-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-saffron-900 mb-2">Major Festivals</h3>
                    <p class="text-gray-600 text-sm">Diwali, Holi, Dussehra, and other major celebrations</p>
                </div>

                <!-- Add more category cards -->
            </div>

            <!-- Festival Guide -->
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{ asset('images/festivals/guide.jpg') }}" alt="Festival Guide">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-saffron-500 font-semibold">Festival Guide</div>
                        <h2 class="mt-2 text-2xl font-semibold text-saffron-900">How to Celebrate Hindu Festivals</h2>
                        <p class="mt-4 text-gray-600">Learn about the traditions, customs, and rituals associated with Hindu festivals.</p>
                        <div class="mt-4">
                            <a href="#" class="inline-flex items-center text-saffron-600 hover:text-saffron-800">
                                Read Guide
                                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 