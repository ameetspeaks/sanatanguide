@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">Edit Blog Post</h1>
            <p class="mt-1 text-sm text-gray-500">Update the details of your blog post below.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="10" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>{{ old('content', $blog->content) }}</textarea>
            </div>

            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                @if($blog->featured_image)
                    <div class="mt-2">
                        <img src="{{ Storage::url($blog->featured_image) }}" alt="Current featured image" class="h-32 w-32 object-cover rounded-lg">
                    </div>
                @endif
                <input type="file" name="featured_image" id="featured_image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                <p class="mt-1 text-sm text-gray-500">Upload a new featured image (optional).</p>
            </div>

            <div>
                <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $blog->meta_title) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <p class="mt-1 text-sm text-gray-500">A title for SEO purposes (optional).</p>
            </div>

            <div>
                <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('meta_description', $blog->meta_description) }}</textarea>
                <p class="mt-1 text-sm text-gray-500">A description for SEO purposes (optional).</p>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="is_featured" class="ml-2 block text-sm text-gray-900">Featured Post</label>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" {{ old('is_active', $blog->is_active) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-900">Active</label>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('blogs.show', $blog) }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 