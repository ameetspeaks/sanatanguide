@extends('layouts.app')

@section('content')
<div class="bg-white">
    <!-- Hero Section -->
    <div class="relative">
        <div class="h-96 w-full bg-saffron rounded-t-lg overflow-hidden">
            @if($puja->featured_image)
                <img src="{{ asset('storage/' . $puja->featured_image) }}" alt="{{ $puja->name }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <svg class="h-24 w-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif
        </div>
    </div>

    <!-- Puja Details -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Main Content -->
            <div class="md:w-2/3">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $puja->name }}</h1>
                
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Deity</h2>
                            <p class="text-gray-600">{{ $puja->deity }}</p>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Duration</h2>
                            <p class="text-gray-600">{{ $puja->duration }} minutes</p>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Category</h2>
                            <p class="text-gray-600">{{ ucfirst($puja->category) }} Puja</p>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Price</h2>
                            <p class="text-gray-600">₹{{ $puja->price }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">About the Puja</h2>
                    <div class="prose max-w-none">
                        {!! $puja->description !!}
                    </div>
                </div>

                @if($puja->benefits)
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Benefits</h2>
                    <div class="prose max-w-none">
                        {!! $puja->benefits !!}
                    </div>
                </div>
                @endif

                @if($puja->procedure)
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Procedure</h2>
                    <div class="prose max-w-none">
                        {!! $puja->procedure !!}
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="md:w-1/3">
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Quick Info</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Category</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ ucfirst($puja->category) }} Puja</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Duration</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $puja->duration }} minutes</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Price</h3>
                            <p class="mt-1 text-sm text-gray-900">₹{{ $puja->price }}</p>
                        </div>
                    </div>
                </div>

                @if($puja->materials)
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Required Materials</h2>
                    <div class="prose max-w-none">
                        {!! $puja->materials !!}
                    </div>
                </div>
                @endif

                @if($puja->gallery && count($puja->gallery) > 0)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Gallery</h2>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($puja->gallery as $image)
                            <div class="aspect-w-1 aspect-h-1">
                                <img src="{{ asset('storage/' . $image) }}" alt="Puja Gallery Image" class="w-full h-full object-cover rounded-lg">
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 