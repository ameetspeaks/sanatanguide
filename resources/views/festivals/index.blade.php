@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Sacred Festivals</h1>
            <p class="text-xl text-gray-600">Celebrate the rich cultural heritage of Sanatan Dharma</p>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Month Filter -->
                <div>
                    <label for="month" class="block text-sm font-medium text-gray-700 mb-1">Filter by Month</label>
                    <select id="month" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        <option value="">All Months</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>

                <!-- Region Filter -->
                <div>
                    <label for="region" class="block text-sm font-medium text-gray-700 mb-1">Filter by Region</label>
                    <select id="region" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        <option value="">All Regions</option>
                        @foreach($regions as $region)
                            <option value="{{ $region }}">{{ $region }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Featured Filter -->
                <div>
                    <label for="featured" class="block text-sm font-medium text-gray-700 mb-1">Filter by Status</label>
                    <select id="featured" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        <option value="">All Festivals</option>
                        <option value="featured">Featured Only</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Upcoming Festivals -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Upcoming Festivals</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($upcomingFestivals as $festival)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        @if($festival->featured_image)
                            <img src="{{ Storage::url($festival->featured_image) }}" alt="{{ $festival->name }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $festival->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($festival->description, 100) }}</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    {{ $festival->date->format('M d, Y') }}
                                </span>
                                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    {{ $festival->region }}
                                </span>
                                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    {{ $festival->deity }}
                                </span>
                            </div>
                            <a href="{{ route('festivals.show', $festival->slug) }}" class="text-orange-600 hover:text-orange-700 font-medium">
                                Learn More →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- All Festivals -->
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">All Festivals</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($festivals as $festival)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        @if($festival->featured_image)
                            <img src="{{ Storage::url($festival->featured_image) }}" alt="{{ $festival->name }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $festival->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($festival->description, 100) }}</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    {{ $festival->date->format('M d, Y') }}
                                </span>
                                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    {{ $festival->region }}
                                </span>
                                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    {{ $festival->deity }}
                                </span>
                            </div>
                            <a href="{{ route('festivals.show', $festival->slug) }}" class="text-orange-600 hover:text-orange-700 font-medium">
                                Learn More →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $festivals->links() }}
        </div>
    </div>
</div>
@endsection 