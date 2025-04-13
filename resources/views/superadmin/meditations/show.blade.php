@extends('layouts.superadmin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Meditation Details</h1>
        <div class="flex space-x-4">
            <a href="{{ route('superadmin.meditations.edit', $meditation) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                Edit Meditation
            </a>
            <a href="{{ route('superadmin.meditations.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition duration-200">
                Back to List
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Information -->
                <div class="space-y-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Basic Information</h2>
                        <dl class="mt-2 space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Title</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $meditation->title }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Description</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $meditation->description }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Category</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $meditation->category }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Duration</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $meditation->duration }} minutes</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Difficulty Level</dt>
                                <dd class="mt-1">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($meditation->difficulty_level === 'beginner') bg-green-100 text-green-800
                                        @elseif($meditation->difficulty_level === 'intermediate') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($meditation->difficulty_level) }}
                                    </span>
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Status</h2>
                        <dl class="mt-2 space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Active Status</dt>
                                <dd class="mt-1">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($meditation->is_active) bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ $meditation->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Featured Status</dt>
                                <dd class="mt-1">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($meditation->is_featured) bg-purple-100 text-purple-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ $meditation->is_featured ? 'Featured' : 'Not Featured' }}
                                    </span>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Media Files -->
                <div class="space-y-4">
                    @if($meditation->featured_image)
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Featured Image</h2>
                            <div class="mt-2">
                                <img src="{{ Storage::url($meditation->featured_image) }}" alt="Featured image" class="h-48 w-full object-cover rounded">
                            </div>
                        </div>
                    @endif

                    @if($meditation->audio_file)
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Audio File</h2>
                            <div class="mt-2">
                                <audio controls class="w-full">
                                    <source src="{{ Storage::url($meditation->audio_file) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                    @endif

                    @if($meditation->video_file)
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Video File</h2>
                            <div class="mt-2">
                                <video controls class="w-full">
                                    <source src="{{ Storage::url($meditation->video_file) }}" type="video/mp4">
                                    Your browser does not support the video element.
                                </video>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Benefits and Instructions -->
            <div class="mt-6 space-y-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Benefits</h2>
                    <div class="mt-2 text-sm text-gray-900">
                        {{ $meditation->benefits }}
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Instructions</h2>
                    <div class="mt-2 text-sm text-gray-900">
                        {{ $meditation->instructions }}
                    </div>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Created At</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $meditation->created_at->format('F j, Y, g:i a') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $meditation->updated_at->format('F j, Y, g:i a') }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection 