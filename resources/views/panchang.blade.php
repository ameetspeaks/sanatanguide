<x-app-layout>
    <div class="py-12 bg-saffron-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-saffron-900 mb-8 text-center">Daily Panchang</h1>
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Today's Date -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-saffron-800 mb-4">Today's Date</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-saffron-50 p-4 rounded-lg">
                            <p class="text-sm text-saffron-600">Gregorian Date</p>
                            <p class="text-lg font-medium">{{ date('d F Y') }}</p>
                        </div>
                        <div class="bg-saffron-50 p-4 rounded-lg">
                            <p class="text-sm text-saffron-600">Hindu Date</p>
                            <p class="text-lg font-medium" id="hinduDate">Loading...</p>
                        </div>
                        <div class="bg-saffron-50 p-4 rounded-lg">
                            <p class="text-sm text-saffron-600">Day of Week</p>
                            <p class="text-lg font-medium">{{ date('l') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Panchang Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Tithi -->
                    <div class="bg-white border border-saffron-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-saffron-800 mb-2">Tithi</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600"><span class="font-medium">Current:</span> <span id="currentTithi">Loading...</span></p>
                            <p class="text-gray-600"><span class="font-medium">Ends at:</span> <span id="tithiEnds">Loading...</span></p>
                        </div>
                    </div>

                    <!-- Nakshatra -->
                    <div class="bg-white border border-saffron-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-saffron-800 mb-2">Nakshatra</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600"><span class="font-medium">Current:</span> <span id="currentNakshatra">Loading...</span></p>
                            <p class="text-gray-600"><span class="font-medium">Ends at:</span> <span id="nakshatraEnds">Loading...</span></p>
                        </div>
                    </div>

                    <!-- Yoga -->
                    <div class="bg-white border border-saffron-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-saffron-800 mb-2">Yoga</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600"><span class="font-medium">Current:</span> <span id="currentYoga">Loading...</span></p>
                            <p class="text-gray-600"><span class="font-medium">Ends at:</span> <span id="yogaEnds">Loading...</span></p>
                        </div>
                    </div>

                    <!-- Karana -->
                    <div class="bg-white border border-saffron-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-saffron-800 mb-2">Karana</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600"><span class="font-medium">Current:</span> <span id="currentKarana">Loading...</span></p>
                            <p class="text-gray-600"><span class="font-medium">Ends at:</span> <span id="karanaEnds">Loading...</span></p>
                        </div>
                    </div>

                    <!-- Auspicious Timings -->
                    <div class="bg-white border border-saffron-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-saffron-800 mb-2">Auspicious Timings</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600"><span class="font-medium">Abhijit:</span> <span id="abhijitMuhurat">Loading...</span></p>
                            <p class="text-gray-600"><span class="font-medium">Brahma:</span> <span id="brahmaMuhurat">Loading...</span></p>
                        </div>
                    </div>

                    <!-- Sunrise/Sunset -->
                    <div class="bg-white border border-saffron-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-saffron-800 mb-2">Sun Timings</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600"><span class="font-medium">Sunrise:</span> <span id="sunrise">Loading...</span></p>
                            <p class="text-gray-600"><span class="font-medium">Sunset:</span> <span id="sunset">Loading...</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 