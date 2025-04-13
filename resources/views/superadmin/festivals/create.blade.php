@extends('layouts.superadmin')

@section('title', 'Create Festival')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-saffron-800">Create New Festival</h1>
        <a href="{{ route('superadmin.festivals.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            Back to Festivals
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">There were {{ $errors->count() }} errors with your submission.</span>
            <ul class="mt-2 list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superadmin.festivals.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Basic Information -->
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Festival Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="deity" class="block text-sm font-medium text-gray-700">Deity</label>
                    <input type="text" name="deity" id="deity" value="{{ old('deity') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                </div>

                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                </div>

                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                    <input type="text" name="duration" id="duration" value="{{ old('duration') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                </div>
            </div>

            <!-- Details -->
            <div class="space-y-4">
                <div>
                    <label for="significance" class="block text-sm font-medium text-gray-700">Significance</label>
                    <textarea name="significance" id="significance" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('significance') }}</textarea>
                </div>

                <div>
                    <label for="rituals" class="block text-sm font-medium text-gray-700">Rituals</label>
                    <textarea name="rituals" id="rituals" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('rituals') }}</textarea>
                </div>

                <div>
                    <label for="customs" class="block text-sm font-medium text-gray-700">Customs</label>
                    <textarea name="customs" id="customs" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('customs') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="mt-6 space-y-4">
            <div>
                <label for="food" class="block text-sm font-medium text-gray-700">Special Foods</label>
                <textarea name="food" id="food" rows="2" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('food') }}</textarea>
            </div>

            <div>
                <label for="clothing" class="block text-sm font-medium text-gray-700">Traditional Clothing</label>
                <textarea name="clothing" id="clothing" rows="2" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('clothing') }}</textarea>
            </div>

            <div>
                <label for="decorations" class="block text-sm font-medium text-gray-700">Decorations</label>
                <textarea name="decorations" id="decorations" rows="2" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('decorations') }}</textarea>
            </div>
        </div>

        <!-- Image Upload -->
        <div class="mt-6">
            <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-saffron-50 file:text-saffron-700 hover:file:bg-saffron-100">
        </div>

        <div class="mt-6">
            <label for="gallery_images" class="block text-sm font-medium text-gray-700">Gallery Images</label>
            <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-saffron-50 file:text-saffron-700 hover:file:bg-saffron-100">
        </div>

        <!-- Status -->
        <div class="mt-6 space-y-4">
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                        class="rounded border-gray-300 text-saffron-600 shadow-sm focus:border-saffron-300 focus:ring focus:ring-saffron-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Mark as Featured Festival</span>
                </label>
            </div>

            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-saffron-600 shadow-sm focus:border-saffron-300 focus:ring focus:ring-saffron-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit" class="w-full bg-saffron-500 text-white py-2 px-4 rounded-lg hover:bg-saffron-600 transition">
                Create Festival
            </button>
        </div>
    </form>
</div>
@endsection 