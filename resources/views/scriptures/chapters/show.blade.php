@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Navigation -->
    <div class="mb-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('scriptures.index') }}" class="text-gray-700 hover:text-saffron-600">
                        Scriptures
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{ route('scriptures.show', $scripture->slug) }}" class="ml-1 text-gray-700 hover:text-saffron-600 md:ml-2">
                            {{ $scripture->name }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-1 text-gray-500 md:ml-2">{{ $chapter->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Chapter Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $chapter->title }}</h1>
                <div class="prose max-w-none">
                    {!! $chapter->content !!}
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between">
                @if($previousChapter)
                    <a href="{{ route('scriptures.chapters.show', [$scripture->slug, $previousChapter->slug]) }}" class="flex items-center text-saffron-600 hover:text-saffron-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Previous Chapter
                    </a>
                @else
                    <div></div>
                @endif

                @if($nextChapter)
                    <a href="{{ route('scriptures.chapters.show', [$scripture->slug, $nextChapter->slug]) }}" class="flex items-center text-saffron-600 hover:text-saffron-700">
                        Next Chapter
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    <div></div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Chapter List -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Chapters</h3>
                <div class="space-y-2">
                    @foreach($scripture->chapters as $chap)
                        <a href="{{ route('scriptures.chapters.show', [$scripture->slug, $chap->slug]) }}" 
                           class="block p-3 rounded-lg {{ $chap->id === $chapter->id ? 'bg-saffron-50 text-saffron-800' : 'text-gray-700 hover:bg-gray-50' }}">
                            {{ $chap->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 