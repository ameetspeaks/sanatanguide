@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-saffron-800 mb-8">Edit Scripture</h1>

        <form action="{{ route('scriptures.update', $scripture->slug) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-saffron-800 mb-4">Basic Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" name="name" id="name" value="{{ $scripture->name }}" class="w-full rounded-lg border-gray-300" required>
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select name="category" id="category" class="w-full rounded-lg border-gray-300" required>
                            <option value="vedas" {{ $scripture->category === 'vedas' ? 'selected' : '' }}>Vedas</option>
                            <option value="upanishads" {{ $scripture->category === 'upanishads' ? 'selected' : '' }}>Upanishads</option>
                            <option value="puranas" {{ $scripture->category === 'puranas' ? 'selected' : '' }}>Puranas</option>
                            <option value="epics" {{ $scripture->category === 'epics' ? 'selected' : '' }}>Epics</option>
                        </select>
                    </div>
                    <div>
                        <label for="language" class="block text-sm font-medium text-gray-700 mb-2">Language</label>
                        <select name="language" id="language" class="w-full rounded-lg border-gray-300" required>
                            <option value="sanskrit" {{ $scripture->language === 'sanskrit' ? 'selected' : '' }}>Sanskrit</option>
                            <option value="hindi" {{ $scripture->language === 'hindi' ? 'selected' : '' }}>Hindi</option>
                            <option value="english" {{ $scripture->language === 'english' ? 'selected' : '' }}>English</option>
                        </select>
                    </div>
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                        <input type="text" name="author" id="author" value="{{ $scripture->author }}" class="w-full rounded-lg border-gray-300">
                    </div>
                    <div>
                        <label for="time_period" class="block text-sm font-medium text-gray-700 mb-2">Time Period</label>
                        <input type="text" name="time_period" id="time_period" value="{{ $scripture->time_period }}" class="w-full rounded-lg border-gray-300">
                    </div>
                </div>
            </div>

            <!-- Description and Significance -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-saffron-800 mb-4">Description and Significance</h2>
                <div class="space-y-6">
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-gray-300" required>{{ $scripture->description }}</textarea>
                    </div>
                    <div>
                        <label for="significance" class="block text-sm font-medium text-gray-700 mb-2">Significance</label>
                        <textarea name="significance" id="significance" rows="4" class="w-full rounded-lg border-gray-300" required>{{ $scripture->significance }}</textarea>
                    </div>
                    <div>
                        <label for="summary" class="block text-sm font-medium text-gray-700 mb-2">Summary</label>
                        <textarea name="summary" id="summary" rows="4" class="w-full rounded-lg border-gray-300" required>{{ $scripture->summary }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-saffron-800 mb-4">Content</h2>
                <div class="space-y-6">
                    <div>
                        <label for="original_text" class="block text-sm font-medium text-gray-700 mb-2">Original Text</label>
                        <textarea name="original_text" id="original_text" rows="6" class="w-full rounded-lg border-gray-300" required>{{ $scripture->original_text }}</textarea>
                    </div>
                    <div>
                        <label for="transliteration" class="block text-sm font-medium text-gray-700 mb-2">Transliteration</label>
                        <textarea name="transliteration" id="transliteration" rows="6" class="w-full rounded-lg border-gray-300" required>{{ $scripture->transliteration }}</textarea>
                    </div>
                    <div>
                        <label for="translation" class="block text-sm font-medium text-gray-700 mb-2">Translation</label>
                        <textarea name="translation" id="translation" rows="6" class="w-full rounded-lg border-gray-300" required>{{ $scripture->translation }}</textarea>
                    </div>
                    <div>
                        <label for="commentary" class="block text-sm font-medium text-gray-700 mb-2">Commentary</label>
                        <textarea name="commentary" id="commentary" rows="6" class="w-full rounded-lg border-gray-300">{{ $scripture->commentary }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Media -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-saffron-800 mb-4">Media</h2>
                <div class="space-y-6">
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        <div class="flex items-center space-x-4">
                            <img src="{{ Storage::url($scripture->featured_image) }}" alt="Current featured image" class="w-32 h-32 object-cover rounded-lg">
                            <input type="file" name="featured_image" id="featured_image" class="flex-1" accept="image/*">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Audio Recitations</label>
                        <div class="space-y-2">
                            @foreach($scripture->audio_recitations as $audio)
                            <div class="flex items-center space-x-2">
                                <audio controls class="flex-1">
                                    <source src="{{ Storage::url($audio) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            @endforeach
                        </div>
                        <label for="audio_recitations" class="block text-sm font-medium text-gray-700 mt-4 mb-2">Add New Audio Recitations</label>
                        <input type="file" name="audio_recitations[]" id="audio_recitations" class="w-full" accept="audio/*" multiple>
                    </div>
                </div>
            </div>

            <!-- Chapters -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-saffron-800 mb-4">Chapters</h2>
                <div id="chapters-container">
                    @foreach($scripture->chapters as $chapter)
                    <div class="flex items-center space-x-4 mb-4">
                        <input type="text" name="chapters[]" value="{{ $chapter }}" class="flex-1 rounded-lg border-gray-300" placeholder="Chapter name" required>
                        <button type="button" class="text-red-600 hover:text-red-700" onclick="this.parentElement.remove()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    @endforeach
                    <button type="button" class="text-saffron-600 hover:text-saffron-700 flex items-center" onclick="addChapter()">
                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Chapter
                    </button>
                </div>
            </div>

            <!-- Featured Status -->
            <div class="mb-8">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" class="rounded border-gray-300 text-saffron-600" {{ $scripture->is_featured ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-700">Mark as Featured</span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-saffron-500 text-white px-6 py-2 rounded-lg hover:bg-saffron-600 transition">
                    Update Scripture
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function addChapter() {
    const container = document.getElementById('chapters-container');
    const div = document.createElement('div');
    div.className = 'flex items-center space-x-4 mb-4';
    div.innerHTML = `
        <input type="text" name="chapters[]" class="flex-1 rounded-lg border-gray-300" placeholder="Chapter name" required>
        <button type="button" class="text-red-600 hover:text-red-700" onclick="this.parentElement.remove()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    `;
    container.insertBefore(div, container.lastElementChild);
}
</script>
@endpush
@endsection 