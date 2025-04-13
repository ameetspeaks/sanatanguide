@extends('layouts.superadmin')

@section('title', 'Edit Temple')

@section('content')
<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Temple</h3>
            <a href="{{ route('superadmin.temples.index') }}" class="text-saffron-600 hover:text-saffron-700">Back to Temples</a>
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

        <form action="{{ route('superadmin.temples.update', $temple) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Temple Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $temple->name) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description', $temple->description) }}</textarea>
                </div>

                <div>
                    <label for="deity" class="block text-sm font-medium text-gray-700">Deity</label>
                    <input type="text" name="deity" id="deity" value="{{ old('deity', $temple->deity) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="city" id="city" value="{{ old('city', $temple->city) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                        <input type="text" name="state" id="state" value="{{ old('state', $temple->state) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea name="address" id="address" rows="2" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('address', $temple->address) }}</textarea>
                </div>

                <div>
                    <label for="pincode" class="block text-sm font-medium text-gray-700">Pincode</label>
                    <input type="text" name="pincode" id="pincode" value="{{ old('pincode', $temple->pincode) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                        <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $temple->latitude) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                        <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $temple->longitude) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="opening_time" class="block text-sm font-medium text-gray-700">Opening Time</label>
                        <input type="time" name="opening_time" id="opening_time" value="{{ old('opening_time', $temple->opening_time) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="closing_time" class="block text-sm font-medium text-gray-700">Closing Time</label>
                        <input type="time" name="closing_time" id="closing_time" value="{{ old('closing_time', $temple->closing_time) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div>
                    <label for="darshan_duration" class="block text-sm font-medium text-gray-700">Darshan Duration (minutes)</label>
                    <input type="number" name="darshan_duration" id="darshan_duration" value="{{ old('darshan_duration', $temple->darshan_duration) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div class="flex items-center">
                            <input type="checkbox" name="special_darshan_available" id="special_darshan_available" value="1" {{ old('special_darshan_available', $temple->special_darshan_available) ? 'checked' : '' }} class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded">
                            <label for="special_darshan_available" class="ml-2 block text-sm text-gray-900">Special Darshan Available</label>
                        </div>
                    </div>
                    <div>
                        <label for="special_darshan_fee" class="block text-sm font-medium text-gray-700">Special Darshan Fee</label>
                        <input type="number" name="special_darshan_fee" id="special_darshan_fee" value="{{ old('special_darshan_fee', $temple->special_darshan_fee) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div>
                    <label for="dress_code" class="block text-sm font-medium text-gray-700">Dress Code</label>
                    <input type="text" name="dress_code" id="dress_code" value="{{ old('dress_code', $temple->dress_code) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="rules" class="block text-sm font-medium text-gray-700">Rules</label>
                    <textarea name="rules" id="rules" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('rules', $temple->rules) }}</textarea>
                </div>

                <div>
                    <label for="facilities" class="block text-sm font-medium text-gray-700">Facilities</label>
                    <textarea name="facilities" id="facilities" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('facilities', $temple->facilities) }}</textarea>
                </div>

                <div>
                    <label for="history" class="block text-sm font-medium text-gray-700">History</label>
                    <textarea name="history" id="history" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('history', $temple->history) }}</textarea>
                </div>

                <div>
                    <label for="architecture" class="block text-sm font-medium text-gray-700">Architecture</label>
                    <textarea name="architecture" id="architecture" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('architecture', $temple->architecture) }}</textarea>
                </div>

                <div>
                    <label for="festivals" class="block text-sm font-medium text-gray-700">Festivals</label>
                    <textarea name="festivals" id="festivals" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('festivals', $temple->festivals) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number" value="{{ old('contact_number', $temple->contact_number) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $temple->email) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div>
                    <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                    <input type="url" name="website" id="website" value="{{ old('website', $temple->website) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <div class="flex items-center">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $temple->is_featured) ? 'checked' : '' }} class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded">
                        <label for="is_featured" class="ml-2 block text-sm text-gray-900">Featured Temple</label>
                    </div>
                </div>

                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                    @if($temple->featured_image)
                        <div class="mt-2">
                            <img src="{{ Storage::url($temple->featured_image) }}" alt="{{ $temple->name }}" class="h-32 w-32 object-cover rounded-lg">
                        </div>
                    @endif
                    <input type="file" name="featured_image" id="featured_image" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300">
                </div>

                <div>
                    <label for="gallery" class="block text-sm font-medium text-gray-700">Gallery Images</label>
                    @if($temple->gallery)
                        <div class="mt-2 grid grid-cols-4 gap-4">
                            @foreach($temple->gallery as $image)
                                <div class="relative">
                                    <img src="{{ Storage::url($image) }}" alt="Gallery Image" class="h-24 w-24 object-cover rounded-lg">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="gallery[]" id="gallery" multiple class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-saffron-600 hover:bg-saffron-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    Update Temple
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 