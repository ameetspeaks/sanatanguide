<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Premium Features') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome to Premium Features!</h3>
                    <p class="mb-4">As a premium user, you have access to:</p>
                    <ul class="list-disc list-inside mb-4">
                        <li>Personalized Panchang</li>
                        <li>Advanced Temple Search</li>
                        <li>Detailed Puja Guides</li>
                        <li>Festival Planning Tools</li>
                        <li>Spiritual Learning Resources</li>
                    </ul>
                    <p>Thank you for supporting SanatanGuide!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 