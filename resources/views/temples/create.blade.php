@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-saffron-800 mb-8">Add New Temple</h1>

        <form action="{{ route('temples.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-lg p-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Information -->
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-saffron-800 mb-4">Basic Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Temple Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="deity" class="block text-sm font-medium text-gray-700">Main Deity</label>
                            <input type="text" name="deity" id="deity" value="{{ old('deity') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('deity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Location Information -->
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-saffron-800 mb-4">Location Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea name="address" id="address" rows="2" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city" id="city" value="{{ old('city') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('city')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                            <input type="text" name="state" id="state" value="{{ old('state') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('state')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pincode" class="block text-sm font-medium text-gray-700">Pincode</label>
                            <input type="text" name="pincode" id="pincode" value="{{ old('pincode') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('pincode')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                            <input type="number" step="any" name="latitude" id="latitude" value="{{ old('latitude') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('latitude')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                            <input type="number" step="any" name="longitude" id="longitude" value="{{ old('longitude') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('longitude')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Timings -->
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-saffron-800 mb-4">Darshan Timings</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="opening_time" class="block text-sm font-medium text-gray-700">Opening Time</label>
                            <input type="time" name="opening_time" id="opening_time" value="{{ old('opening_time') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('opening_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="closing_time" class="block text-sm font-medium text-gray-700">Closing Time</label>
                            <input type="time" name="closing_time" id="closing_time" value="{{ old('closing_time') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('closing_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="darshan_duration" class="block text-sm font-medium text-gray-700">Darshan Duration (minutes)</label>
                            <input type="number" name="darshan_duration" id="darshan_duration" value="{{ old('darshan_duration') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('darshan_duration')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="special_darshan_available" id="special_darshan_available" value="1"
                                class="rounded border-gray-300 text-saffron-600 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            <label for="special_darshan_available" class="ml-2 block text-sm text-gray-700">Special Darshan Available</label>
                        </div>

                        <div id="special_darshan_fee_container" class="hidden">
                            <label for="special_darshan_fee" class="block text-sm font-medium text-gray-700">Special Darshan Fee (₹)</label>
                            <input type="number" step="0.01" name="special_darshan_fee" id="special_darshan_fee" value="{{ old('special_darshan_fee') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('special_darshan_fee')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-saffron-800 mb-4">Additional Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="dress_code" class="block text-sm font-medium text-gray-700">Dress Code</label>
                            <textarea name="dress_code" id="dress_code" rows="2"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('dress_code') }}</textarea>
                            @error('dress_code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="rules" class="block text-sm font-medium text-gray-700">Rules (One per line)</label>
                            <textarea name="rules" id="rules" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('rules') }}</textarea>
                            @error('rules')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="facilities" class="block text-sm font-medium text-gray-700">Facilities (One per line)</label>
                            <textarea name="facilities" id="facilities" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('facilities') }}</textarea>
                            @error('facilities')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="history" class="block text-sm font-medium text-gray-700">History</label>
                            <textarea name="history" id="history" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('history') }}</textarea>
                            @error('history')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="architecture" class="block text-sm font-medium text-gray-700">Architecture</label>
                            <textarea name="architecture" id="architecture" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">{{ old('architecture') }}</textarea>
                            @error('architecture')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-saffron-800 mb-4">Contact Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" value="{{ old('contact_number') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('contact_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                            <input type="url" name="website" id="website" value="{{ old('website') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                            @error('website')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-saffron-800 mb-4">Images</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-saffron-50 file:text-saffron-700 hover:file:bg-saffron-100">
                            @error('featured_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="gallery" class="block text-sm font-medium text-gray-700">Gallery Images</label>
                            <input type="file" name="gallery[]" id="gallery" accept="image/*" multiple
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-saffron-50 file:text-saffron-700 hover:file:bg-saffron-100">
                            @error('gallery')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Featured Status -->
                <div class="md:col-span-2">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                            class="rounded border-gray-300 text-saffron-600 shadow-sm focus:border-saffron-500 focus:ring focus:ring-saffron-200">
                        <label for="is_featured" class="ml-2 block text-sm text-gray-700">Mark as Featured Temple</label>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-saffron-500 text-white px-6 py-3 rounded-lg hover:bg-saffron-600 transition">
                    Create Temple
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const specialDarshanCheckbox = document.getElementById('special_darshan_available');
        const specialDarshanFeeContainer = document.getElementById('special_darshan_fee_container');

        function toggleSpecialDarshanFee() {
            specialDarshanFeeContainer.classList.toggle('hidden', !specialDarshanCheckbox.checked);
        }

        specialDarshanCheckbox.addEventListener('change', toggleSpecialDarshanFee);
        toggleSpecialDarshanFee(); // Initial state
    });
</script>
@endpush
@endsection 