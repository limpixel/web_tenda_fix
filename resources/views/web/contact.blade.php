@extends('layouts.fe-layout')

@section('fe-content')
<section class="bg-white py-12">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <!-- Form Section -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-900">Contact Us</h2>
                <p class="mt-2 text-gray-600">
                    Fill in the data for the profile. It will take a couple of minutes.
                    You only need a passport.
                </p>

                <form class="mt-8 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Contacts</h3>
                        <p class="text-sm text-gray-500">
                            These contacts are used to inform about orders
                        </p>
                    </div>

                    <!-- Email Input -->
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 7.5l-9.877 6.585c-.542.361-1.204.361-1.746 0L.75 7.5m21 0v9.75a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V7.5m19.5 0L12 13.5 1.5 7.5" />
                        </svg>
                        <input type="email" class="ml-4 w-full border-none focus:outline-none focus:ring-0"
                            placeholder="alex_manager@gmail.com" readonly />
                    </div>

                    <!-- Phone Number Input -->
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 4.5l.294-.882a1.5 1.5 0 011.432-1.068h16.548a1.5 1.5 0 011.432 1.068l.294.882M2.25 4.5h19.5M2.25 4.5v15a1.5 1.5 0 001.5 1.5h16.5a1.5 1.5 0 001.5-1.5v-15m-19.5 0H21" />
                        </svg>
                        <input type="tel" class="ml-4 w-full border-none focus:outline-none focus:ring-0"
                            placeholder="+62 555 555-1234" readonly />
                    </div>

                    <!-- Tenda Type and Size Inputs -->
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="tenda-type" class="block text-sm font-medium text-gray-700">
                                Type Tenda
                            </label>
                            <select id="tenda-type"
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option>Dekorasi</option>
                                <!-- Add more options here if needed -->
                            </select>
                        </div>

                        <div class="flex-1">
                            <label for="size" class="block text-sm font-medium text-gray-700">
                                Ukuran
                            </label>
                            <input id="size" type="text"
                                class="mt-1 p-[9px]  block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="10 m²" />
                        </div>
                    </div>

                    <!-- Message Textarea -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">
                            Pesan
                        </label>
                        <textarea id="message" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="Write your message here..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full flex items-center justify-center rounded-md bg-indigo-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Send The Message
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="ml-2 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Image Section -->
            <div class="flex items-center justify-center">
                <img src="{{asset('images/contact_person.png')}}" alt="Person working on laptop"
                    class="rounded-lg hidden lg:block h-[550px] shadow-lg" />
            </div>
        </div>
    </div>
</section>
@endsection