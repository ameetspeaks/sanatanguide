@extends('layouts.superadmin')

@section('title', 'SuperAdmin Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-saffron-800">SuperAdmin Dashboard</h1>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Users</h3>
            <p class="text-3xl font-bold text-saffron-600">{{ $stats['users'] }}</p>
            <p class="text-sm text-gray-500 mt-2">{{ $stats['premium_users'] }} premium users</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Temples</h3>
            <p class="text-3xl font-bold text-saffron-600">{{ $stats['temples'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Festivals</h3>
            <p class="text-3xl font-bold text-saffron-600">{{ $stats['festivals'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Scriptures</h3>
            <p class="text-3xl font-bold text-saffron-600">{{ $stats['scriptures'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">SuperAdmins</h3>
            <p class="text-3xl font-bold text-saffron-600">{{ $stats['superadmins'] }}</p>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Users -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Users</h3>
            <div class="space-y-4">
                @foreach($recentUsers as $user)
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                    <div class="flex space-x-2">
                        @if($user->is_premium)
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Premium</span>
                        @endif
                        @if($user->is_superadmin)
                        <span class="bg-saffron-100 text-saffron-800 px-2 py-1 rounded text-xs">SuperAdmin</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">
                <a href="{{ route('superadmin.users.index') }}" class="text-saffron-600 hover:text-saffron-700">View All Users</a>
            </div>
        </div>

        <!-- Recent Temples -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Temples</h3>
            <div class="space-y-4">
                @foreach($recentTemples as $temple)
                <div>
                    <p class="font-medium">{{ $temple->name }}</p>
                    <p class="text-sm text-gray-500">{{ $temple->city }}, {{ $temple->state }}</p>
                </div>
                @endforeach
            </div>
            <div class="mt-4">
                <a href="{{ route('superadmin.temples.index') }}" class="text-saffron-600 hover:text-saffron-700">View All Temples</a>
            </div>
        </div>

        <!-- Recent Festivals -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Festivals</h3>
            <div class="space-y-4">
                @foreach($recentFestivals as $festival)
                <div>
                    <p class="font-medium">{{ $festival->name }}</p>
                    <p class="text-sm text-gray-500">{{ $festival->category }}</p>
                </div>
                @endforeach
            </div>
            <div class="mt-4">
                <a href="{{ route('superadmin.festivals.index') }}" class="text-saffron-600 hover:text-saffron-700">View All Festivals</a>
            </div>
        </div>
    </div>
</div>
@endsection 