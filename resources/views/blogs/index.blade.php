@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Blog Posts</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($blogs as $blog)
            <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                @if($blog->featured_image)
                    <img src="{{ Storage::url($blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">
                        <a href="{{ route('blogs.show', $blog) }}" class="hover:text-saffron-600">
                            {{ $blog->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit(strip_tags($blog->content), 150) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p class="text-gray-900">
                                    {{ $blog->user ? $blog->user->name : 'Anonymous' }}
                                </p>
                                <p class="text-gray-500">
                                    {{ $blog->created_at->format('M d, Y') }}
                                </p>
                            </div>
                        </div>
                        @if($blog->is_featured)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-saffron-100 text-saffron-800">
                                Featured
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $blogs->links() }}
    </div>
</div>
@endsection 