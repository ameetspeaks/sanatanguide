@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-white rounded-lg shadow-sm p-8">
            <!-- Error Illustration -->
            <div class="mb-8">
                <svg class="mx-auto h-32 w-32 text-saffron-600" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M34 24L24 24M24 24L14 24M24 24L24 14M24 24L24 34"/>
                    <circle cx="24" cy="24" r="20" stroke-width="2"/>
                </svg>
            </div>

            <!-- Error Message -->
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Page Not Found</h1>
            <p class="text-lg text-gray-600 mb-8">
                The scripture or page you're looking for could not be found. Please check the URL or try navigating from the home page.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-saffron-600 hover:bg-saffron-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Return Home
                </a>
                <a href="{{ route('scriptures.index') }}" class="inline-flex items-center px-6 py-3 border border-saffron-600 text-base font-medium rounded-md text-saffron-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Browse Scriptures
                </a>
            </div>

            <!-- Help Text -->
            <p class="mt-8 text-sm text-gray-500">
                If you believe this is an error, please <a href="mailto:support@sanatanguide.com" class="text-saffron-600 hover:text-saffron-700">contact us</a>.
            </p>
        </div>
    </div>
</div>
@endsection 