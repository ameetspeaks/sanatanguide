@extends('layouts.superadmin')

@section('title', 'Create Puja')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-saffron-800">Create New Puja</h1>
        <a href="{{ route('superadmin.pujas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            Back to Pujas
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

    <form action="{{ route('superadmin.pujas.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Basic Information -->
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Puja Name</label>
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
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" id="category" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                        <option value="">Select Category</option>
                        <option value="daily" {{ old('category') == 'daily' ? 'selected' : '' }}>Daily Puja</option>
                        <option value="special" {{ old('category') == 'special' ? 'selected' : '' }}>Special Occasion</option>
                        <option value="festival" {{ old('category') == 'festival' ? 'selected' : '' }}>Festival Puja</option>
                        <option value="personal" {{ old('category') == 'personal' ? 'selected' : '' }}>Personal Puja</option>
                    </select>
                </div>
            </div>

            <!-- Timing and Pricing -->
            <div class="space-y-4">
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                    <input type="number" name="duration" id="duration" value="{{ old('duration') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price (₹)</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                </div>

                <div>
                    <label for="benefits" class="block text-sm font-medium text-gray-700">Benefits</label>
                    <textarea name="benefits" id="benefits" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('benefits') }}</textarea>
                </div>

                <div>
                    <label for="significance" class="block text-sm font-medium text-gray-700">Significance</label>
                    <textarea name="significance" id="significance" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('significance') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Required Items and Procedure -->
        <div class="mt-6 space-y-4">
            <div>
                <label for="required_items" class="block text-sm font-medium text-gray-700">Required Items</label>
                <textarea name="required_items" id="required_items" rows="3" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('required_items') }}</textarea>
                <p class="mt-1 text-sm text-gray-500">List all required items for the puja, separated by commas</p>
            </div>

            <div>
                <label for="procedure" class="block text-sm font-medium text-gray-700">Procedure</label>
                <textarea name="procedure" id="procedure" rows="4" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('procedure') }}</textarea>
            </div>
        </div>

        <!-- Image Upload -->
        <div class="mt-6">
            <label for="featured_image" class="block text-sm font-medium text-gray-700">Puja Image</label>
            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-saffron-50 file:text-saffron-700 hover:file:bg-saffron-100">
        </div>

        <!-- Featured Status -->
        <div class="mt-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-saffron-600 shadow-sm focus:border-saffron-300 focus:ring focus:ring-saffron-200 focus:ring-opacity-50">
                <span class="ml-2 text-sm text-gray-700">Mark as Featured Puja</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit" class="w-full bg-saffron-500 text-white py-2 px-4 rounded-lg hover:bg-saffron-600 transition">
                Create Puja
            </button>
        </div>
    </form>
</div>
@endsection 