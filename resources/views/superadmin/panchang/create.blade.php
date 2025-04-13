@extends('layouts.superadmin')

@section('title', 'Add New Panchang Entry')

@section('content')
<div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-6">Add New Panchang Entry</h3>

        <form action="{{ route('superadmin.panchang.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="date" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="tithi" class="block text-sm font-medium text-gray-700">Tithi</label>
                    <input type="text" name="tithi" id="tithi" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="nakshatra" class="block text-sm font-medium text-gray-700">Nakshatra</label>
                    <input type="text" name="nakshatra" id="nakshatra" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="yoga" class="block text-sm font-medium text-gray-700">Yoga</label>
                    <input type="text" name="yoga" id="yoga" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="karana" class="block text-sm font-medium text-gray-700">Karana</label>
                    <input type="text" name="karana" id="karana" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="sunrise" class="block text-sm font-medium text-gray-700">Sunrise</label>
                    <input type="time" name="sunrise" id="sunrise" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="sunset" class="block text-sm font-medium text-gray-700">Sunset</label>
                    <input type="time" name="sunset" id="sunset" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="moonrise" class="block text-sm font-medium text-gray-700">Moonrise</label>
                    <input type="time" name="moonrise" id="moonrise" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="moonset" class="block text-sm font-medium text-gray-700">Moonset</label>
                    <input type="time" name="moonset" id="moonset" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="rahukalam" class="block text-sm font-medium text-gray-700">Rahukalam</label>
                    <input type="text" name="rahukalam" id="rahukalam" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="yamagandam" class="block text-sm font-medium text-gray-700">Yamagandam</label>
                    <input type="text" name="yamagandam" id="yamagandam" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="gulikakalam" class="block text-sm font-medium text-gray-700">Gulikakalam</label>
                    <input type="text" name="gulikakalam" id="gulikakalam" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="abhyudayam" class="block text-sm font-medium text-gray-700">Abhyudayam</label>
                    <input type="text" name="abhyudayam" id="abhyudayam" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="amritakalam" class="block text-sm font-medium text-gray-700">Amritakalam</label>
                    <input type="text" name="amritakalam" id="amritakalam" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="brahmamuhurta" class="block text-sm font-medium text-gray-700">Brahmamuhurta</label>
                    <input type="text" name="brahmamuhurta" id="brahmamuhurta" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="sm:col-span-2">
                    <label for="auspicious_timings" class="block text-sm font-medium text-gray-700">Auspicious Timings</label>
                    <textarea name="auspicious_timings" id="auspicious_timings" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    <p class="mt-2 text-sm text-gray-500">Enter each timing on a new line</p>
                </div>

                <div class="sm:col-span-2">
                    <label for="inauspicious_timings" class="block text-sm font-medium text-gray-700">Inauspicious Timings</label>
                    <textarea name="inauspicious_timings" id="inauspicious_timings" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    <p class="mt-2 text-sm text-gray-500">Enter each timing on a new line</p>
                </div>

                <div class="sm:col-span-2">
                    <label for="festivals" class="block text-sm font-medium text-gray-700">Festivals</label>
                    <textarea name="festivals" id="festivals" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    <p class="mt-2 text-sm text-gray-500">Enter each festival on a new line</p>
                </div>

                <div class="sm:col-span-2">
                    <label for="special_events" class="block text-sm font-medium text-gray-700">Special Events</label>
                    <textarea name="special_events" id="special_events" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    <p class="mt-2 text-sm text-gray-500">Enter each event on a new line</p>
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-saffron-500 focus:border-saffron-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-saffron-600 hover:bg-saffron-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    Save Entry
                </button>
                <a href="{{ route('superadmin.panchang.index') }}" class="ml-3 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saffron-500">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 