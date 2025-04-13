@extends('layouts.app')

@section('content')
<div class="bg-white">
    <!-- Hero Section -->
    <div class="relative">
        <div class="h-96 w-full bg-saffron rounded-t-lg overflow-hidden">
            @if($temple->featured_image)
                <img src="{{ asset('storage/' . $temple->featured_image) }}" alt="{{ $temple->name }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <svg class="h-24 w-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif
        </div>
    </div>

    <!-- Temple Details -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Main Content -->
            <div class="md:w-2/3">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $temple->name }}</h1>
                
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Location</h2>
                            <p class="text-gray-600">{{ $temple->address }}, {{ $temple->city }}, {{ $temple->state }}, {{ $temple->country }}</p>
                            <p class="text-gray-600">PIN: {{ $temple->pincode }}</p>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Timings</h2>
                            <p class="text-gray-600">Opening: {{ $temple->opening_time }}</p>
                            <p class="text-gray-600">Closing: {{ $temple->closing_time }}</p>
                            <p class="text-gray-600">Darshan Duration: {{ $temple->darshan_duration }} minutes</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">About the Temple</h2>
                    <div class="prose max-w-none">
                        {!! $temple->description !!}
                    </div>
                </div>

                @if($temple->history)
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">History</h2>
                    <div class="prose max-w-none">
                        {!! $temple->history !!}
                    </div>
                </div>
                @endif

                @if($temple->architecture)
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Architecture</h2>
                    <div class="prose max-w-none">
                        {!! $temple->architecture !!}
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
                            <h3 class="text-sm font-medium text-gray-500">Deity</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $temple->deity }}</p>
                        </div>
                        @if($temple->special_darshan_available)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Special Darshan</h3>
                            <p class="mt-1 text-sm text-gray-900">Available (Fee: ₹{{ $temple->special_darshan_fee }})</p>
                        </div>
                        @endif
                        @if($temple->dress_code)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dress Code</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $temple->dress_code }}</p>
                        </div>
                        @endif
                        @if($temple->rules)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Rules</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $temple->rules }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                @if($temple->facilities)
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Facilities</h2>
                    <div class="prose max-w-none">
                        {!! $temple->facilities !!}
                    </div>
                </div>
                @endif

                @if($temple->contact_number || $temple->email || $temple->website)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Contact Information</h2>
                    <div class="space-y-4">
                        @if($temple->contact_number)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Phone</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $temple->contact_number }}</p>
                        </div>
                        @endif
                        @if($temple->email)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Email</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $temple->email }}</p>
                        </div>
                        @endif
                        @if($temple->website)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Website</h3>
                            <a href="{{ $temple->website }}" target="_blank" class="mt-1 text-sm text-blue-600 hover:text-blue-800">{{ $temple->website }}</a>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 