@extends('layouts.superadmin')

@section('title', 'Panchang Entry Details')

@section('content')
<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Panchang Entry Details</h3>
            <div class="flex space-x-3">
                <a href="{{ route('superadmin.panchang.edit', $panchang) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-saffron-600 hover:bg-saffron-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    Edit Entry
                </a>
                <a href="{{ route('superadmin.panchang.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    Back to List
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <h4 class="text-sm font-medium text-gray-500">Date</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->date->format('d M Y') }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Tithi</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->tithi }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Nakshatra</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->nakshatra }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Yoga</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->yoga }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Karana</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->karana }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Sunrise</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->sunrise }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Sunset</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->sunset }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Moonrise</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->moonrise }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Moonset</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->moonset }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Rahukalam</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->rahukalam }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Yamagandam</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->yamagandam }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Gulikakalam</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->gulikakalam }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Abhyudayam</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->abhyudayam }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Amritakalam</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->amritakalam }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500">Brahmamuhurta</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->brahmamuhurta }}</p>
            </div>

            <div class="sm:col-span-2">
                <h4 class="text-sm font-medium text-gray-500">Auspicious Timings</h4>
                <ul class="mt-1 text-sm text-gray-900 list-disc list-inside">
                    @foreach($panchang->auspicious_timings ?? [] as $timing)
                        <li>{{ $timing }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="sm:col-span-2">
                <h4 class="text-sm font-medium text-gray-500">Inauspicious Timings</h4>
                <ul class="mt-1 text-sm text-gray-900 list-disc list-inside">
                    @foreach($panchang->inauspicious_timings ?? [] as $timing)
                        <li>{{ $timing }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="sm:col-span-2">
                <h4 class="text-sm font-medium text-gray-500">Festivals</h4>
                <ul class="mt-1 text-sm text-gray-900 list-disc list-inside">
                    @foreach($panchang->festivals ?? [] as $festival)
                        <li>{{ $festival }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="sm:col-span-2">
                <h4 class="text-sm font-medium text-gray-500">Special Events</h4>
                <ul class="mt-1 text-sm text-gray-900 list-disc list-inside">
                    @foreach($panchang->special_events ?? [] as $event)
                        <li>{{ $event }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="sm:col-span-2">
                <h4 class="text-sm font-medium text-gray-500">Description</h4>
                <p class="mt-1 text-sm text-gray-900">{{ $panchang->description }}</p>
            </div>
        </div>
    </div>
</div>
@endsection 