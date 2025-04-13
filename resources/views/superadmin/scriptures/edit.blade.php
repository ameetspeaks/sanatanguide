@extends('layouts.superadmin')

@section('title', 'Edit Scripture')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Edit Scripture</h1>
                <a href="{{ route('superadmin.scriptures.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    Back to Scriptures
                </a>
            </div>

            <form action="{{ route('superadmin.scriptures.update', $scripture) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <!-- Basic Information -->
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $scripture->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('description', $scripture->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                            <input type="text" name="language" id="language" value="{{ old('language', $scripture->language) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">
                            @error('language')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input type="text" name="author" id="author" value="{{ old('author', $scripture->author) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">
                            @error('author')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="period" class="block text-sm font-medium text-gray-700">Period</label>
                            <input type="text" name="period" id="period" value="{{ old('period', $scripture->period) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">
                            @error('period')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="google_drive_pdf_url" class="block text-sm font-medium text-gray-700">Google Drive PDF URL</label>
                            <input type="url" name="google_drive_pdf_url" id="google_drive_pdf_url" 
                                   value="{{ old('google_drive_pdf_url', $scripture->google_drive_pdf_url) }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500" 
                                   placeholder="https://drive.google.com/file/d/...">
                            <p class="mt-1 text-sm text-gray-500">Enter the shareable link to your Google Drive PDF file. Make sure the sharing settings are set to "Anyone with the link can view".</p>
                            @error('google_drive_pdf_url')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Media Uploads -->
                    <div class="space-y-6">
                        <div>
                            <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                            <input type="file" name="featured_image" id="featured_image" 
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-saffron-50 file:text-saffron-700 hover:file:bg-saffron-100"
                                   accept="image/*">
                            @error('featured_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @if($scripture->featured_image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($scripture->featured_image) }}" alt="Current featured image" class="h-40 w-40 object-cover rounded-lg">
                                </div>
                            @endif
                        </div>

                        <div>
                            <label for="gallery_images" class="block text-sm font-medium text-gray-700">Gallery Images</label>
                            <input type="file" name="gallery_images[]" id="gallery_images" multiple 
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-saffron-50 file:text-saffron-700 hover:file:bg-saffron-100"
                                   accept="image/*">
                            @error('gallery_images')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @if($scripture->gallery_images)
                                <div class="mt-2 grid grid-cols-4 gap-4">
                                    @foreach($scripture->gallery_images as $image)
                                        <div class="relative">
                                            <img src="{{ Storage::url($image) }}" alt="Gallery image" class="h-32 w-32 object-cover rounded-lg">
                                            <button type="button" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600" onclick="removeGalleryImage(this)">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Content Sections -->
                    <div class="space-y-6">
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('content', $scripture->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="significance" class="block text-sm font-medium text-gray-700">Significance</label>
                            <textarea name="significance" id="significance" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('significance', $scripture->significance) }}</textarea>
                            @error('significance')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="teachings" class="block text-sm font-medium text-gray-700">Teachings</label>
                            <textarea name="teachings" id="teachings" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('teachings', $scripture->teachings) }}</textarea>
                            @error('teachings')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="commentary" class="block text-sm font-medium text-gray-700">Commentary</label>
                            <textarea name="commentary" id="commentary" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring-saffron-500">{{ old('commentary', $scripture->commentary) }}</textarea>
                            @error('commentary')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Status Toggles -->
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $scripture->is_featured) ? 'checked' : '' }} class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded">
                            <label for="is_featured" class="ml-2 block text-sm text-gray-900">Featured</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $scripture->is_active) ? 'checked' : '' }} class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">Active</label>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('superadmin.scriptures.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-saffron-600 hover:bg-saffron-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                        Update Scripture
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function removeGalleryImage(button) {
    const imageContainer = button.closest('.relative');
    imageContainer.remove();
}
</script>
@endpush
@endsection 