@extends('layouts.app')

@section('content')
<div class="bg-orange-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Sacred Temples</h1>
            <p class="text-xl text-gray-600">Discover ancient temples and their divine significance</p>
        </div>

        <!-- Filters Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- State Filter -->
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700 mb-1">Filter by State</label>
                    <select id="state" name="state" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        <option value="">All States</option>
                        @foreach($states ?? [] as $state)
                            <option value="{{ $state }}">{{ $state }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- City Filter -->
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Filter by City</label>
                    <select id="city" name="city" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        <option value="">All Cities</option>
                        @foreach($cities ?? [] as $city)
                            <option value="{{ $city }}">{{ $city }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Deity Filter -->
                <div>
                    <label for="deity" class="block text-sm font-medium text-gray-700 mb-1">Filter by Deity</label>
                    <select id="deity" name="deity" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        <option value="">All Deities</option>
                        @foreach($deities ?? [] as $deity)
                            <option value="{{ $deity }}">{{ $deity }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Featured Temples Section -->
        @if(isset($featuredTemples) && $featuredTemples->count() > 0)
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Featured Temples</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($featuredTemples as $temple)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        @if($temple->featured_image)
                            <img src="{{ Storage::url($temple->featured_image) }}" alt="{{ $temple->name }}" class="w-full h-64 object-cover">
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No image available</span>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4">
                            <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm">Featured</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $temple->name }}</h3>
                        <div class="flex items-center text-gray-600 mb-4">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>{{ $temple->city }}, {{ $temple->state }}</span>
                        </div>
                        <p class="text-gray-600 mb-4">{{ Str::limit($temple->description, 150) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $temple->deity }}
                            </span>
                            @if($temple->timings)
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Open: {{ $temple->timings }}
                                </span>
                            @endif
                        </div>
                        <a href="{{ route('temples.show', $temple->slug) }}" class="inline-flex items-center text-orange-600 hover:text-orange-700">
                            Learn More
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- All Temples Section -->
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">All Temples</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($temples as $temple)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        @if($temple->featured_image)
                            <img src="{{ Storage::url($temple->featured_image) }}" alt="{{ $temple->name }}" class="w-full h-64 object-cover">
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No image available</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $temple->name }}</h3>
                        <div class="flex items-center text-gray-600 mb-4">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>{{ $temple->city }}, {{ $temple->state }}</span>
                        </div>
                        <p class="text-gray-600 mb-4">{{ Str::limit($temple->description, 150) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $temple->deity }}
                            </span>
                            @if($temple->timings)
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Open: {{ $temple->timings }}
                                </span>
                            @endif
                            @if($temple->significance)
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    {{ Str::limit($temple->significance, 30) }}
                                </span>
                            @endif
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('temples.show', $temple->slug) }}" class="inline-flex items-center text-orange-600 hover:text-orange-700">
                                Learn More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            @if($temple->virtual_tour_url)
                                <a href="{{ $temple->virtual_tour_url }}" target="_blank" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-vr-cardboard mr-1"></i>
                                    Virtual Tour
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center py-12">
                    <p class="text-gray-600">No temples found matching your criteria.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($temples->hasPages())
            <div class="mt-8">
                {{ $temples->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection 