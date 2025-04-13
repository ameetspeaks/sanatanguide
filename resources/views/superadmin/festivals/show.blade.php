@extends('layouts.superadmin')

@section('title', 'Festival Details')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-saffron-800">Festival Details</h1>
        <div class="flex space-x-4">
            <a href="{{ route('superadmin.festivals.edit', $festival) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Edit Festival
            </a>
            <a href="{{ route('superadmin.festivals.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                Back to Festivals
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Featured Image -->
        <div class="relative h-64">
            @if($festival->featured_image)
                <img src="{{ Storage::url($festival->featured_image) }}" alt="{{ $festival->name }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                <h2 class="text-2xl font-bold text-white">{{ $festival->name }}</h2>
                <p class="text-white">{{ $festival->deity }}</p>
            </div>
        </div>

        <div class="p-6">
            <!-- Status Badges -->
            <div class="flex space-x-2 mb-6">
                @if($festival->is_featured)
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-saffron-100 text-saffron-800">
                        Featured
                    </span>
                @endif
                @if($festival->is_active)
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                @else
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                        Inactive
                    </span>
                @endif
            </div>

            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Date & Duration</h3>
                    <dl class="grid grid-cols-1 gap-2">
                        <div class="bg-gray-50 px-4 py-3 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">Date</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $festival->date->format('F d, Y') }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">Duration</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $festival->duration }}</dd>
                        </div>
                    </dl>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg">
                        <p class="text-sm text-gray-900">{{ $festival->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Significance and Rituals -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Significance</h3>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg">
                        <p class="text-sm text-gray-900">{{ $festival->significance }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Rituals</h3>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg">
                        <p class="text-sm text-gray-900">{{ $festival->rituals }}</p>
                    </div>
                </div>
            </div>

            <!-- Customs and Traditions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Customs</h3>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg">
                        <p class="text-sm text-gray-900">{{ $festival->customs }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Traditional Clothing</h3>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg">
                        <p class="text-sm text-gray-900">{{ $festival->clothing }}</p>
                    </div>
                </div>
            </div>

            <!-- Food and Decorations -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Special Foods</h3>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg">
                        <p class="text-sm text-gray-900">{{ $festival->food }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Decorations</h3>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg">
                        <p class="text-sm text-gray-900">{{ $festival->decorations }}</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Images -->
            @if($festival->gallery_images && count($festival->gallery_images) > 0)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Gallery</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($festival->gallery_images as $image)
                            <div class="relative group">
                                <img src="{{ Storage::url($image) }}" alt="Gallery image" class="w-full h-32 object-cover rounded-lg">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Timestamps -->
            <div class="border-t border-gray-200 pt-4">
                <dl class="grid grid-cols-1 gap-2">
                    <div class="bg-gray-50 px-4 py-3 rounded-lg">
                        <dt class="text-sm font-medium text-gray-500">Created At</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $festival->created_at->format('F d, Y H:i') }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg">
                        <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $festival->updated_at->format('F d, Y H:i') }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection 