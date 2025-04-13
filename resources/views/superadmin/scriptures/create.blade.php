@extends('layouts.superadmin')

@section('title', 'Create New Scripture')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-saffron-800">Create New Scripture</h1>
        <a href="{{ route('superadmin.scriptures.index') }}" class="text-saffron-600 hover:text-saffron-800">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">There were {{ $errors->count() }} errors with your submission:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superadmin.scriptures.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Basic Information -->
            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Scripture Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                    <input type="text" name="language" id="language" value="{{ old('language') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">
                </div>

                <div>
                    <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                    <input type="text" name="author" id="author" value="{{ old('author') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">
                </div>

                <div>
                    <label for="period" class="block text-sm font-medium text-gray-700">Period</label>
                    <input type="text" name="period" id="period" value="{{ old('period') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">
                </div>
            </div>

            <!-- Content and Media -->
            <div class="space-y-6">
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('content') }}</textarea>
                </div>

                <div>
                    <label for="significance" class="block text-sm font-medium text-gray-700">Significance</label>
                    <textarea name="significance" id="significance" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('significance') }}</textarea>
                </div>

                <div>
                    <label for="teachings" class="block text-sm font-medium text-gray-700">Teachings</label>
                    <textarea name="teachings" id="teachings" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('teachings') }}</textarea>
                </div>

                <div>
                    <label for="commentary" class="block text-sm font-medium text-gray-700">Commentary</label>
                    <textarea name="commentary" id="commentary" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('commentary') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Media Uploads -->
        <div class="mt-6 space-y-6">
            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                <input type="file" name="featured_image" id="featured_image" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-saffron-50 file:text-saffron-700 hover:file:bg-saffron-100">
                <p class="mt-1 text-sm text-gray-500">Upload a featured image for the scripture (max 2MB)</p>
            </div>

            <div>
                <label for="gallery_images" class="block text-sm font-medium text-gray-700">Gallery Images</label>
                <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-saffron-50 file:text-saffron-700 hover:file:bg-saffron-100">
                <p class="mt-1 text-sm text-gray-500">Upload multiple images for the gallery (max 2MB each)</p>
            </div>
        </div>

        <!-- Status Options -->
        <div class="mt-6 space-y-4">
            <div class="flex items-center">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                    class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded">
                <label for="is_featured" class="ml-2 block text-sm text-gray-900">Mark as Featured</label>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                    class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-900">Active</label>
            </div>
        </div>

        <div class="mt-8">
            <button type="submit" class="bg-saffron-500 text-white px-6 py-2 rounded-lg hover:bg-saffron-600 transition">
                Create Scripture
            </button>
        </div>
    </form>
</div>
@endsection 