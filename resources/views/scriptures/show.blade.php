@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="lg:w-3/4">
                <!-- Scripture Header -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="flex flex-col md:flex-row gap-6">
                        @if($scripture->featured_image)
                            <div class="md:w-1/3">
                                <img src="{{ Storage::url($scripture->featured_image) }}" alt="{{ $scripture->name }}" class="w-full h-64 object-cover rounded-lg">
                            </div>
                        @endif
                        <div class="md:w-2/3">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $scripture->name }}</h1>
                            <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-4">
                                @if($scripture->category)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                    </svg>
                                    {{ $scripture->category }}
                                </span>
                                @endif
                                @if($scripture->language)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                                    </svg>
                                    {{ $scripture->language }}
                                </span>
                                @endif
                                @if($scripture->period)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $scripture->period }}
                                </span>
                                @endif
                            </div>
                            @if($scripture->description)
                            <p class="text-gray-700">{{ $scripture->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Content Sections -->
                <div class="space-y-6">
                    @if($scripture->content)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Content</h2>
                        <div class="prose max-w-none">
                            {!! $scripture->content !!}
                        </div>
                    </div>
                    @endif

                    @if($scripture->significance)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Significance</h2>
                        <div class="prose max-w-none">
                            {!! $scripture->significance !!}
                        </div>
                    </div>
                    @endif

                    @if($scripture->commentary)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Commentary</h2>
                        <div class="prose max-w-none">
                            {!! $scripture->commentary !!}
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Gallery Images -->
                @if($scripture->gallery_images && is_array($scripture->gallery_images) && count($scripture->gallery_images) > 0)
                    <div class="bg-white rounded-lg shadow-sm p-6 mt-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Gallery</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($scripture->gallery_images as $image)
                                <div class="aspect-w-1 aspect-h-1">
                                    <img src="{{ Storage::url($image) }}" alt="Gallery image" class="w-full h-full object-cover rounded-lg">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/4 space-y-6">
                <!-- Actions -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Actions</h2>
                    <div class="space-y-4">
                        @if($scripture->google_drive_pdf_url)
                        <a href="{{ route('scriptures.read', $scripture) }}" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-saffron-600 hover:bg-saffron-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            Read Scripture
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Chapters -->
                @if($scripture->chapters && is_array($scripture->chapters) && count($scripture->chapters) > 0)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Chapters</h2>
                    <nav class="space-y-2">
                        @foreach($scripture->chapters as $chapter)
                            <a href="#chapter-{{ $chapter['number'] }}" class="block text-gray-600 hover:text-gray-900">
                                Chapter {{ $chapter['number'] }}: {{ $chapter['title'] }}
                            </a>
                        @endforeach
                    </nav>
                </div>
                @endif

                <!-- Audio Recitations -->
                @if($scripture->audio_recitations && is_array($scripture->audio_recitations) && count($scripture->audio_recitations) > 0)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Audio Recitations</h2>
                    <div class="space-y-2">
                        @foreach($scripture->audio_recitations as $audio)
                            <a href="{{ $audio['url'] }}" class="flex items-center text-sm text-gray-600 hover:text-gray-900">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                </svg>
                                {{ $audio['title'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Key Teachings -->
                @if($scripture->teachings && is_array($scripture->teachings) && count($scripture->teachings) > 0)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Key Teachings</h2>
                    <ul class="space-y-2">
                        @foreach($scripture->teachings as $teaching)
                            <li class="text-sm text-gray-600">{{ $teaching }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 