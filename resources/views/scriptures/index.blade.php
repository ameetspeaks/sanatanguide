@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="bg-saffron-50 rounded-lg p-8 mb-8">
        <h1 class="text-4xl font-bold text-saffron-800 mb-4">Sacred Scriptures</h1>
        <p class="text-lg text-gray-600">Explore the timeless wisdom of Hindu scriptures, from the Vedas to the Puranas.</p>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <form action="{{ route('scriptures.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="language" class="block text-sm font-medium text-gray-700 mb-2">Language</label>
                <select name="language" id="language" class="w-full rounded-lg border-gray-300">
                    <option value="">All Languages</option>
                    @foreach($languages as $lang)
                        <option value="{{ $lang }}" {{ request('language') == $lang ? 'selected' : '' }}>
                            {{ $lang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="period" class="block text-sm font-medium text-gray-700 mb-2">Period</label>
                <select name="period" id="period" class="w-full rounded-lg border-gray-300">
                    <option value="">All Periods</option>
                    @foreach($periods as $period)
                        <option value="{{ $period }}" {{ request('period') == $period ? 'selected' : '' }}>
                            {{ $period }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <select name="category" id="category" class="w-full rounded-lg border-gray-300">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-3 flex justify-end">
                <button type="submit" class="bg-saffron-500 text-white px-6 py-2 rounded-lg hover:bg-saffron-600 transition">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    <!-- Featured Scriptures -->
    @if($featuredScriptures->count() > 0)
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Featured Scriptures</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredScriptures as $scripture)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    @if($scripture->featured_image)
                        <img src="{{ Storage::url($scripture->featured_image) }}" alt="{{ $scripture->name }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $scripture->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($scripture->description, 100) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-saffron-100 text-saffron-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $scripture->language }}
                            </span>
                            <span class="bg-saffron-100 text-saffron-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $scripture->period }}
                            </span>
                            <span class="bg-saffron-100 text-saffron-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $scripture->category }}
                            </span>
                        </div>
                        <a href="{{ route('scriptures.show', $scripture->slug) }}" class="text-saffron-600 hover:text-saffron-700 font-medium">
                            Learn More →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- All Scriptures -->
    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">All Scriptures</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($scriptures as $scripture)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    @if($scripture->featured_image)
                        <img src="{{ Storage::url($scripture->featured_image) }}" alt="{{ $scripture->name }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $scripture->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($scripture->description, 100) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-saffron-100 text-saffron-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $scripture->language }}
                            </span>
                            <span class="bg-saffron-100 text-saffron-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $scripture->period }}
                            </span>
                            <span class="bg-saffron-100 text-saffron-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ $scripture->category }}
                            </span>
                        </div>
                        <a href="{{ route('scriptures.show', $scripture->slug) }}" class="text-saffron-600 hover:text-saffron-700 font-medium">
                            Learn More →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $scriptures->links() }}
        </div>
    </div>
</div>
@endsection 