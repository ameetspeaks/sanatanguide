@extends('layouts.app')

@section('content')
<div class="bg-orange-50 min-h-screen">
    <!-- Header Section with Date Picker -->
    <div class="bg-orange-600 text-white py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div>
                    <h1 class="text-3xl font-bold">पंचांग / Panchang</h1>
                    <p class="text-orange-100">Daily Hindu Almanac</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-orange-700 hover:bg-orange-800 px-4 py-2 rounded-lg">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="bg-white rounded-lg p-2 flex items-center">
                        <input type="date" class="text-gray-800 px-2 py-1 rounded" value="{{ date('Y-m-d') }}">
                    </div>
                    <button class="bg-orange-700 hover:bg-orange-800 px-4 py-2 rounded-lg">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Left Sidebar - Tithi & Nakshatra Info -->
            <div class="space-y-6">
                <!-- Tithi Card -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold text-orange-800 mb-4">तिथि / Tithi</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tithi Number</span>
                            <span class="font-semibold">{{ $panchang->tithi_number ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tithi Name</span>
                            <span class="font-semibold">{{ $panchang->tithi_name ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Ends At</span>
                            <span class="font-semibold">{{ $panchang->tithi_end ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Nakshatra Card -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold text-orange-800 mb-4">नक्षत्र / Nakshatra</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nakshatra</span>
                            <span class="font-semibold">{{ $panchang->nakshatra ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Ends At</span>
                            <span class="font-semibold">{{ $panchang->nakshatra_end ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Yoga Card -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold text-orange-800 mb-4">योग / Yoga</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Yoga</span>
                            <span class="font-semibold">{{ $panchang->yoga ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Ends At</span>
                            <span class="font-semibold">{{ $panchang->yoga_end ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Center - Muhurat & Timings -->
            <div class="space-y-6">
                <!-- Auspicious Timings -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold text-orange-800 mb-4">शुभ मुहूर्त / Auspicious Timings</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Brahma Muhurta</span>
                            <span class="font-semibold">{{ $panchang->brahma_muhurta ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Abhijit</span>
                            <span class="font-semibold">{{ $panchang->abhijit ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Godhuli</span>
                            <span class="font-semibold">{{ $panchang->godhuli ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Vijaya</span>
                            <span class="font-semibold">{{ $panchang->vijaya ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Inauspicious Timings -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold text-orange-800 mb-4">राहु काल / Inauspicious Timings</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Rahu Kaal</span>
                            <span class="font-semibold">{{ $panchang->rahu_kaal ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Yamaganda</span>
                            <span class="font-semibold">{{ $panchang->yamaganda ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Gulika</span>
                            <span class="font-semibold">{{ $panchang->gulika ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Sun, Moon & Additional Info -->
            <div class="space-y-6">
                <!-- Sun Timings -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold text-orange-800 mb-4">सूर्य / Sun</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sunrise</span>
                            <span class="font-semibold">{{ $panchang->sunrise ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sunset</span>
                            <span class="font-semibold">{{ $panchang->sunset ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Moon Info -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold text-orange-800 mb-4">चन्द्र / Moon</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Moon Sign</span>
                            <span class="font-semibold">{{ $panchang->moon_sign ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Phase</span>
                            <span class="font-semibold">{{ $panchang->moon_phase ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Hindu Calendar -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold text-orange-800 mb-4">हिन्दू कैलेंडर / Hindu Calendar</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Samvat</span>
                            <span class="font-semibold">{{ $panchang->samvat ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Month (Masa)</span>
                            <span class="font-semibold">{{ $panchang->masa ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Paksha</span>
                            <span class="font-semibold">{{ $panchang->paksha ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Festival & Events Section -->
        <div class="mt-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold text-orange-800 mb-4">आज के त्योहार / Today's Festivals & Events</h2>
                @if(isset($panchang->festivals) && count($panchang->festivals) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($panchang->festivals as $festival)
                            <div class="bg-orange-50 rounded-lg p-4">
                                <h3 class="font-semibold text-orange-800">{{ $festival->name }}</h3>
                                <p class="text-gray-600 text-sm">{{ $festival->description }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">No festivals or special events today</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 