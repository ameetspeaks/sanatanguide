<x-app-layout>
    <div class="py-12 bg-saffron-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-saffron-900 mb-4">Hindu Scriptures</h1>
                <p class="text-lg text-gray-600">Explore the ancient wisdom of Hindu sacred texts</p>
            </div>

            <!-- Scripture Categories -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Vedas -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-saffron-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-saffron-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-saffron-900 mb-2">Vedas</h3>
                    <p class="text-gray-600 text-sm mb-4">The oldest and most sacred Hindu texts</p>
                    <a href="#" class="text-saffron-600 hover:text-saffron-800">Explore Vedas →</a>
                </div>

                <!-- Upanishads -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-saffron-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-saffron-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-saffron-900 mb-2">Upanishads</h3>
                    <p class="text-gray-600 text-sm mb-4">Philosophical texts exploring Brahman and Atman</p>
                    <a href="#" class="text-saffron-600 hover:text-saffron-800">Explore Upanishads →</a>
                </div>

                <!-- Puranas -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-saffron-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-saffron-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-saffron-900 mb-2">Puranas</h3>
                    <p class="text-gray-600 text-sm mb-4">Ancient stories and legends of gods and sages</p>
                    <a href="#" class="text-saffron-600 hover:text-saffron-800">Explore Puranas →</a>
                </div>

                <!-- Itihasas -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-saffron-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-saffron-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-saffron-900 mb-2">Itihasas</h3>
                    <p class="text-gray-600 text-sm mb-4">Historical epics like Ramayana and Mahabharata</p>
                    <a href="#" class="text-saffron-600 hover:text-saffron-800">Explore Itihasas →</a>
                </div>
            </div>

            <!-- Featured Scripture -->
            <div class="bg-white rounded-lg shadow-xl overflow-hidden mb-12">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{ asset('images/scriptures/bhagavad-gita.jpg') }}" alt="Bhagavad Gita">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-saffron-500 font-semibold">Featured Scripture</div>
                        <h2 class="mt-2 text-2xl font-semibold text-saffron-900">Bhagavad Gita</h2>
                        <p class="mt-4 text-gray-600">The divine song of Lord Krishna, teaching the path of dharma and spiritual wisdom.</p>
                        <div class="mt-4">
                            <a href="#" class="inline-flex items-center text-saffron-600 hover:text-saffron-800">
                                Read Now
                                <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scripture Study Tools -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Sanskrit Dictionary -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-saffron-900 mb-4">Sanskrit Dictionary</h3>
                    <p class="text-gray-600 mb-4">Look up meanings of Sanskrit words and verses</p>
                    <a href="#" class="text-saffron-600 hover:text-saffron-800">Open Dictionary →</a>
                </div>

                <!-- Audio Recitations -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-saffron-900 mb-4">Audio Recitations</h3>
                    <p class="text-gray-600 mb-4">Listen to sacred verses with proper pronunciation</p>
                    <a href="#" class="text-saffron-600 hover:text-saffron-800">Listen Now →</a>
                </div>

                <!-- Commentary -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-saffron-900 mb-4">Commentary</h3>
                    <p class="text-gray-600 mb-4">Read interpretations by renowned scholars</p>
                    <a href="#" class="text-saffron-600 hover:text-saffron-800">View Commentary →</a>
                </div>
            </div>

            <!-- Daily Verse -->
            <div class="bg-white rounded-lg shadow-xl p-8 text-center">
                <h2 class="text-2xl font-semibold text-saffron-900 mb-6">Verse of the Day</h2>
                <blockquote class="text-xl text-gray-700 mb-4">
                    "कर्मण्येवाधिकारस्ते मा फलेषु कदाचन।<br>
                    मा कर्मफलहेतुर्भूर्मा ते सङ्गोऽस्त्वकर्मणि॥"
                </blockquote>
                <p class="text-gray-600 mb-4">
                    "You have the right to work only but never to its fruits.<br>
                    Let not the fruits of action be your motive, nor let your attachment be to inaction."
                </p>
                <p class="text-sm text-saffron-600">- Bhagavad Gita, Chapter 2, Verse 47</p>
            </div>
        </div>
    </div>
</x-app-layout> 