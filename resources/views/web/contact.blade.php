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

                <form id="whatsappForm" class="mt-8 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Contacts</h3>
                        <p class="text-sm text-gray-500">
                            These contacts are used to inform about orders
                        </p>
                    </div>

                    <!-- Email Input -->
                    

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
                            <select id="tendaType"
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option>Dekorasi</option>
                                <option>Roder</option>
                                <option>Canopy</option>
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

<!-- JavaScript -->
<script>
    document.getElementById('whatsappForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const tendaType = document.getElementById('tendaType').value;
        const size = document.getElementById('size').value;
        const message = document.getElementById('message').value;

        // Nomor dari backend Laravel (tanpa awalan 0)
        @if (isset($contact))
            const phoneNumber = "62{{ ltrim($contact->nomor_wa, '0') }}";
        @else
            alert("Nomor wa tidak terdaftar")
            return;
        @endif

        const text = `Halo admin,%0ASaya ingin memesan tenda dengan detail berikut:%0A- Type: ${tendaType}%0A- Ukuran: ${size}%0A- Pesan Tambahan: ${message}`;

        const url = `https://wa.me/${phoneNumber}?text=${text}`;
        window.open(url, '_blank');
    });
</script>

@endsection