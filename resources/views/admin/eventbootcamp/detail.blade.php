<x-app-layout>
    <div class="dropdown dropdown-top dropdown-end">
        <div tabindex="0" role="button"
            class="fixed bottom-5 right-5 rounded-full w-14 h-14 bg-[#133256] grid place-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <ul tabindex="0"
                class="dropdown-content z-[1] menu p-2 shadow bg-white rounded-box w-52 mb-3 text-gray-700">
                <li><a href="{{ route('admin.event.create', $category) }}">Tambah Event</a></li>
                <li><a href="{{ route('admin.bootcamp.create', $category) }}">Tambah Bootcamp</a></li>
            </ul>
        </div>
    </div>
    <div class="py-12 px-10 text-gray-700">
        <h1 class="text-xl font-bold">Event & Bootcamp</h1>
        <div class="grid grid-cols-4 mt-5 gap-5">
            @foreach($events as $event)
            <a href="{{ route('admin.event.read', $event->id) }}" class="hover:border-2 rounded-2xl transition-all">
                <div class="card bg-white shadow-xl">
                    <div class="px-10 pt-10 bg-center bg-contain bg-no-repeat"
                        style="background-image: url('{{ asset('storage/eventFoto/'. $event->foto) }}')">
                        <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                            class="invisible" />
                    </div>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">{{ $event->namaEvent }}</h2>
                        <p class="flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            {{ $event->tanggal }}
                        </p>
                        <p class="flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>
                            Rp. {{ number_format($event->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </a>
            @endforeach
            @foreach($bootcamps as $bootcamp)
            <a href="{{ route('admin.bootcamp.read', $bootcamp->id) }}" class="hover:border-2 rounded-2xl transition-all">
                <div class="card bg-white shadow-xl">
                    <div class="px-10 pt-10 bg-center bg-contain bg-no-repeat"
                        style="background-image: url('{{ asset('storage/bootcampFoto/'. $bootcamp->foto) }}')">
                        <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                            class="invisible" />
                    </div>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">{{ $bootcamp->namaBootcamp }}</h2>
                        <p class="flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            {{ $bootcamp->tanggal }}
                        </p>
                        <p class="flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>
                            Rp. {{ number_format($bootcamp->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
