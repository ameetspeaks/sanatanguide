@extends('layouts.superadmin')

@section('title', 'Scripture Details')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-saffron-800">{{ $scripture->name }}</h1>
        <div class="flex space-x-4">
            <a href="{{ route('superadmin.scriptures.edit', $scripture) }}" class="bg-saffron-500 text-white px-4 py-2 rounded-lg hover:bg-saffron-600 transition">
                Edit Scripture
            </a>
            <a href="{{ route('superadmin.scriptures.index') }}" class="text-saffron-600 hover:text-saffron-800">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <!-- Basic Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">Description</h3>
                    <p class="mt-1 text-gray-700">{{ $scripture->description }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Language</h3>
                    <p class="mt-1 text-gray-700">{{ $scripture->language }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Author</h3>
                    <p class="mt-1 text-gray-700">{{ $scripture->author }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Period</h3>
                    <p class="mt-1 text-gray-700">{{ $scripture->period }}</p>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">Content</h3>
                    <p class="mt-1 text-gray-700">{{ $scripture->content }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Significance</h3>
                    <p class="mt-1 text-gray-700">{{ $scripture->significance }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Teachings</h3>
                    <p class="mt-1 text-gray-700">{{ $scripture->teachings }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Commentary</h3>
                    <p class="mt-1 text-gray-700">{{ $scripture->commentary }}</p>
                </div>
            </div>
        </div>

        <!-- PDF File -->
        @if($scripture->pdf_file)
            <div class="mt-8">
                <h3 class="text-lg font-medium text-gray-900">PDF File</h3>
                <div class="mt-2">
                    <a href="{{ Storage::url($scripture->pdf_file) }}" target="_blank" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        View PDF
                    </a>
                </div>
            </div>
        @endif

        <!-- Images -->
        <div class="mt-8">
            <h3 class="text-lg font-medium text-gray-900">Images</h3>
            <div class="mt-4 space-y-6">
                @if($scripture->featured_image)
                    <div>
                        <h4 class="text-md font-medium text-gray-700">Featured Image</h4>
                        <img src="{{ Storage::url($scripture->featured_image) }}" alt="{{ $scripture->name }}" class="mt-2 h-48 w-48 object-cover rounded-lg">
                    </div>
                @endif

                @if($scripture->gallery_images)
                    <div>
                        <h4 class="text-md font-medium text-gray-700">Gallery Images</h4>
                        <div class="mt-2 grid grid-cols-4 gap-4">
                            @foreach($scripture->gallery_images as $image)
                                <img src="{{ Storage::url($image) }}" alt="Gallery image" class="h-32 w-32 object-cover rounded-lg">
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Status -->
        <div class="mt-8">
            <h3 class="text-lg font-medium text-gray-900">Status</h3>
            <div class="mt-2 flex space-x-4">
                @if($scripture->is_featured)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-saffron-100 text-saffron-800">
                        Featured
                    </span>
                @endif
                @if($scripture->is_active)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Inactive
                    </span>
                @endif
            </div>
        </div>

        <!-- Timestamps -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="text-sm text-gray-500">
                <p>Created: {{ $scripture->created_at->format('F j, Y g:i A') }}</p>
                <p class="mt-1">Last Updated: {{ $scripture->updated_at->format('F j, Y g:i A') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection 