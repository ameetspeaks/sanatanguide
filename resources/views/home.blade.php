@extends('layouts.app')

@section('content')
<!-- Hero Section with Daily Wisdom -->
<div class="bg-gradient-to-r from-orange-50 to-amber-50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Welcome to SanatanGuide</h1>
            <p class="text-xl text-gray-600 mb-8">Discover the timeless wisdom of Sanatan Dharma</p>
            
        </div>
    </div>
</div>

<!-- Daily Wisdom Section -->
<div class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Today's Wisdom</h2>
            @if($dailyWisdom)
                <div class="bg-orange-50 rounded-lg shadow-lg p-8 mb-8">
                    <div class="flex flex-col md:flex-row items-center">
                        @if($dailyWisdom->featured_image)
                            <div class="md:w-1/3 mb-6 md:mb-0">
                                <img src="{{ Storage::url($dailyWisdom->featured_image) }}" alt="{{ $dailyWisdom->title }}" class="rounded-lg shadow-md">
                            </div>
                        @endif
                        <div class="md:w-2/3 md:pl-8">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ $dailyWisdom->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $dailyWisdom->content }}</p>
                            <p class="text-sm text-gray-500">Source: {{ $dailyWisdom->source }}</p>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-center text-gray-600">No wisdom available for today.</p>
            @endif
        </div>
    </div>
</div>

<!-- Features Grid -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Explore Our Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Temples -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Sacred Temples</h3>
                    <p class="text-gray-600 mb-4">Discover ancient temples, their history, and significance.</p>
                    <a href="{{ route('temples.index') }}" class="text-orange-600 hover:text-orange-700 font-medium">Explore Temples →</a>
                </div>
            </div>

            <!-- Pujas -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Sacred Rituals</h3>
                    <p class="text-gray-600 mb-4">Learn about various pujas, their procedures, and benefits.</p>
                    <a href="{{ route('pujas.index') }}" class="text-orange-600 hover:text-orange-700 font-medium">Explore Pujas →</a>
                </div>
            </div>

            <!-- Scriptures -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Sacred Texts</h3>
                    <p class="text-gray-600 mb-4">Dive into ancient scriptures and their teachings.</p>
                    <a href="{{ route('scriptures.index') }}" class="text-orange-600 hover:text-orange-700 font-medium">Explore Scriptures →</a>
                </div>
            </div>

            <!-- Meditations -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Meditation Guide</h3>
                    <p class="text-gray-600 mb-4">Learn various meditation techniques and practices.</p>
                    <a href="{{ route('meditations.index') }}" class="text-orange-600 hover:text-orange-700 font-medium">Explore Meditations →</a>
                </div>
            </div>

            <!-- Blog -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Spiritual Blog</h3>
                    <p class="text-gray-600 mb-4">Read articles on spirituality and ancient wisdom.</p>
                    <a href="{{ route('blogs.index') }}" class="text-orange-600 hover:text-orange-700 font-medium">Read Blog →</a>
                </div>
            </div>

            <!-- Panchang -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Panchang</h3>
                    <p class="text-gray-600 mb-4">Check today's auspicious timings and events.</p>
                    <a href="{{ route('panchang.index') }}" class="text-orange-600 hover:text-orange-700 font-medium">View Panchang →</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Content -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Featured Content</h2>
        
        <!-- Featured Blogs -->
        <div class="mb-12">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Latest Articles</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredBlogs as $blog)
                    <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden">
                        @if($blog->featured_image)
                            <img src="{{ Storage::url($blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $blog->title }}</h4>
                            <p class="text-gray-600 mb-4">{{ Str::limit($blog->content, 100) }}</p>
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="text-orange-600 hover:text-orange-700 font-medium">Read More →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Featured Temples -->
        <div class="mb-12">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Featured Temples</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredTemples as $temple)
                    <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden">
                        @if($temple->featured_image)
                            <img src="{{ Storage::url($temple->featured_image) }}" alt="{{ $temple->name }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $temple->name }}</h4>
                            <p class="text-gray-600 mb-4">{{ Str::limit($temple->description, 100) }}</p>
                            <a href="{{ route('temples.show', $temple->slug) }}" class="text-orange-600 hover:text-orange-700 font-medium">Learn More →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection 