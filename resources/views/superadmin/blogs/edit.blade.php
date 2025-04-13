@extends('layouts.superadmin')

@section('title', 'Edit Blog Post')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Edit Blog Post</h1>
            <a href="{{ route('superadmin.blogs.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Blogs
            </a>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('superadmin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500" value="{{ old('title', $blog->title) }}" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500" value="{{ old('meta_title', $blog->meta_title) }}">
                        @error('meta_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        @error('meta_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content" id="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500" required>{{ old('content', $blog->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Media Upload -->
                <div class="space-y-6">
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                        <div class="mt-1 flex items-center">
                            <input type="file" name="featured_image" id="featured_image" class="sr-only" accept="image/*" onchange="showPreview(event, 'featured-preview')">
                            <label for="featured_image" class="relative cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-saffron-500">
                                <span>Change image</span>
                            </label>
                        </div>
                        <div id="featured-preview" class="mt-2 {{ $blog->featured_image ? '' : 'hidden' }}">
                            <img src="{{ $blog->featured_image ? Storage::url($blog->featured_image) : '#' }}" alt="Featured image preview" class="h-32 w-auto">
                        </div>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Status Toggles -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded" value="1" {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }}>
                            <label for="is_featured" class="ml-2 block text-sm text-gray-700">Featured Post</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded" value="1" {{ old('is_active', $blog->is_active) ? 'checked' : '' }}>
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-saffron-600 hover:bg-saffron-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                        Update Blog Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function showPreview(event, previewId) {
    if (event.target.files.length > 0) {
        const preview = document.getElementById(previewId);
        const previewImg = preview.querySelector('img');
        previewImg.src = URL.createObjectURL(event.target.files[0]);
        preview.classList.remove('hidden');
    }
}
</script>
@endpush
@endsection 