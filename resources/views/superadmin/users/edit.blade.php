@extends('layouts.superadmin')

@section('title', 'Edit User')

@section('content')
<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit User</h3>
            <a href="{{ route('superadmin.users.index') }}" class="text-saffron-600 hover:text-saffron-700">Back to Users</a>
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

        <form action="{{ route('superadmin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $user->birth_date?->format('Y-m-d')) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $user->location) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="gotra" class="block text-sm font-medium text-gray-700">Gotra</label>
                    <input type="text" name="gotra" id="gotra" value="{{ old('gotra', $user->gotra) }}" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-saffron-500 focus:border-saffron-500 sm:text-sm rounded-md">
                        <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_premium" id="is_premium" value="1" {{ old('is_premium', $user->is_premium) ? 'checked' : '' }} class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded">
                    <label for="is_premium" class="ml-2 block text-sm text-gray-900">Premium User</label>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_superadmin" id="is_superadmin" value="1" {{ old('is_superadmin', $user->is_superadmin) ? 'checked' : '' }} class="h-4 w-4 text-saffron-600 focus:ring-saffron-500 border-gray-300 rounded">
                    <label for="is_superadmin" class="ml-2 block text-sm text-gray-900">SuperAdmin</label>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-saffron-600 hover:bg-saffron-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    Update User
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 