@extends('layouts.superadmin')

@section('title', 'Edit Puja')

@section('content')
<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Puja</h3>
            <a href="{{ route('superadmin.pujas.index') }}" class="text-saffron-600 hover:text-saffron-700">Back to Pujas</a>
        </div>

        @if($errors->any())
            <div class="rounded-md bg-red-50 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">There were {{ $errors->count() }} errors with your submission</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('superadmin.pujas.update', $puja) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Puja Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $puja->name) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description', $puja->description) }}</textarea>
                </div>

                <div>
                    <label for="deity" class="block text-sm font-medium text-gray-700">Deity</label>
                    <input type="text" name="deity" id="deity" value="{{ old('deity', $puja->deity) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" id="category" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-saffron-500 focus:border-saffron-500 sm:text-sm rounded-md">
                        <option value="">Select a category</option>
                        <option value="daily" {{ old('category', $puja->category) == 'daily' ? 'selected' : '' }}>Daily Puja</option>
                        <option value="special" {{ old('category', $puja->category) == 'special' ? 'selected' : '' }}>Special Puja</option>
                        <option value="festival" {{ old('category', $puja->category) == 'festival' ? 'selected' : '' }}>Festival Puja</option>
                        <option value="personal" {{ old('category', $puja->category) == 'personal' ? 'selected' : '' }}>Personal Puja</option>
                    </select>
                </div>

                <div>
                    <label for="significance" class="block text-sm font-medium text-gray-700">Significance</label>
                    <textarea name="significance" id="significance" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('significance', $puja->significance) }}</textarea>
                </div>

                <div>
                    <label for="required_items" class="block text-sm font-medium text-gray-700">Required Items</label>
                    <textarea name="required_items" id="required_items" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('required_items', $puja->required_items) }}</textarea>
                </div>

                <div>
                    <label for="benefits" class="block text-sm font-medium text-gray-700">Benefits</label>
                    <textarea name="benefits" id="benefits" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('benefits', $puja->benefits) }}</textarea>
                </div>

                <div>
                    <label for="procedure" class="block text-sm font-medium text-gray-700">Procedure</label>
                    <textarea name="procedure" id="procedure" rows="5" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('procedure', $puja->procedure) }}</textarea>
                </div>

                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                    @if($puja->featured_image)
                        <div class="mt-2">
                            <img src="{{ Storage::url($puja->featured_image) }}" alt="{{ $puja->name }}" class="h-32 w-32 object-cover rounded-lg">
                        </div>
                    @endif
                    <input type="file" name="featured_image" id="featured_image" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300">
                </div>

                <div>
                    <label for="gallery" class="block text-sm font-medium text-gray-700">Gallery Images</label>
                    @if($puja->gallery)
                        <div class="mt-2 grid grid-cols-4 gap-4">
                            @foreach($puja->gallery as $image)
                                <img src="{{ Storage::url($image) }}" alt="{{ $puja->name }}" class="h-24 w-24 object-cover rounded-lg">
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="gallery[]" id="gallery" multiple class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300">
                </div>

                <div>
                    <div class="flex items-center">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $puja->is_featured) ? 'checked' : '' }} class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded">
                        <label for="is_featured" class="ml-2 block text-sm text-gray-900">Featured Puja</label>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-saffron-600 hover:bg-saffron-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    Update Puja
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 