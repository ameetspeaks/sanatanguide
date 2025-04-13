@extends('layouts.app')

@section('content')
<div class="bg-orange-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Sacred Pujas</h1>
            <p class="text-xl text-gray-600">Discover traditional Hindu rituals and their spiritual significance</p>
        </div>

        <!-- Filters Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Category Filter -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Filter by Category</label>
                    <select id="category" name="category" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        <option value="">All Categories</option>
                        @foreach($categories ?? [] as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
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

                <!-- Duration Filter -->
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Filter by Duration</label>
                    <select id="duration" name="duration" class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        <option value="">All Durations</option>
                        <option value="short">Short (< 30 mins)</option>
                        <option value="medium">Medium (30-60 mins)</option>
                        <option value="long">Long (> 60 mins)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Featured Pujas Section -->
        @if(isset($featuredPujas) && $featuredPujas->count() > 0)
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Featured Pujas</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($featuredPujas as $puja)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        @if($puja->featured_image)
                            <img src="{{ Storage::url($puja->featured_image) }}" alt="{{ $puja->name }}" class="w-full h-64 object-cover">
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
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $puja->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($puja->description, 150) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $puja->deity }}
                            </span>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $puja->category }}
                            </span>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $puja->duration_minutes }} mins
                            </span>
                        </div>
                        <a href="{{ route('pujas.show', $puja->slug) }}" class="inline-flex items-center text-orange-600 hover:text-orange-700">
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

        <!-- All Pujas Section -->
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">All Pujas</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($pujas as $puja)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="relative">
                        @if($puja->featured_image)
                            <img src="{{ Storage::url($puja->featured_image) }}" alt="{{ $puja->name }}" class="w-full h-64 object-cover">
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No image available</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $puja->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($puja->description, 150) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $puja->deity }}
                            </span>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $puja->category }}
                            </span>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $puja->duration_minutes }} mins
                            </span>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($puja->materials_required)
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Materials Required
                                </span>
                            @endif
                            @if($puja->mantras)
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Includes Mantras
                                </span>
                            @endif
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('pujas.show', $puja->slug) }}" class="inline-flex items-center text-orange-600 hover:text-orange-700">
                                Learn More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            @if($puja->video_url)
                                <a href="{{ $puja->video_url }}" target="_blank" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-video mr-1"></i>
                                    Watch Video
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center py-12">
                    <p class="text-gray-600">No pujas found matching your criteria.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($pujas->hasPages())
            <div class="mt-8">
                {{ $pujas->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection 