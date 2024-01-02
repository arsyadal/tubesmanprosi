<x-app-layout>
    <div class="py-12 px-10 text-gray-700">
        <h1 class="text-xl font-bold">Event & Bootcamp</h1>
        <div class="grid grid-cols-4 mt-5 gap-5">
            @foreach($events as $event)
            <label for="eventModal{{ $event->id }}" class="hover:border-2 rounded-2xl transition-all cursor-pointer">
                <div class="card bg-white shadow-xl">
                    <div class="px-10 pt-10 bg-center bg-contain bg-no-repeat rounded-t-2xl"
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
            </label>

            <!-- Event Modal -->
            <input type="checkbox" id="eventModal{{ $event->id }}" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box w-11/12 max-w-5xl bg-white">
                    <div class="flex items-center gap-x-5">
                        <div class="w-1/2 px-10 pt-10 bg-center bg-contain bg-no-repeat rounded-2xl"
                            style="background-image: url('{{ asset('storage/eventFoto/'. $event->foto) }}')">
                            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                                class="invisible" />
                        </div>
                        <div class="w-1/2">
                            <h1 class="text-xl font-bold">{{ $event->namaEvent }}</h1>
                            <h1 class="text-lg font-medium">{{ $event->namaPemateri }}</h1>
                            <form action="{{ route('user.event.register') }}" method="post">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="btn bg-[#AC8039] text-white border-0">Daftar Sekarang</button>
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-5 mt-4">
                        <div class="flex items-center gap-x-5">
                            <h3 class="font-bold text-lg w-1/5">Tanggal Event</h3>
                            <p class="w-4/5">{{ $event->tanggal }}</p>
                        </div>
                        <div class="flex items-center gap-x-5">
                            <h3 class="font-bold text-lg w-1/5">Harga Event</h3>
                            <p class="w-4/5">{{ $event->harga }}</p>
                        </div>
                        <div class="flex items-center gap-x-5">
                            <h3 class="font-bold text-lg w-1/5">Deskripsi</h3>
                            <p class="w-4/5">{{ $event->deskripsi }}</p>
                        </div>
                        <div class="flex items-center gap-x-5">
                            <h3 class="font-bold text-lg w-1/5">Tempat / Link</h3>
                            <p class="w-4/5">{{ $event->tempatLink }}</p>
                        </div>
                    </div>
                </div>
                <label class="modal-backdrop" for="eventModal{{ $event->id }}">Close</label>
            </div>
            @endforeach
            @foreach($bootcamps as $bootcamp)
            <label for="bootcampModal{{ $event->id }}" class="hover:border-2 rounded-2xl transition-all cursor-pointer">
                <div class="card bg-white shadow-xl">
                    <div class="px-10 pt-10 bg-center bg-contain bg-no-repeat rounded-t-2xl"
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
            </label>
            <!-- Event Modal -->
            <input type="checkbox" id="bootcampModal{{ $event->id }}" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box w-11/12 max-w-5xl bg-white">
                    <div class="flex items-center gap-x-5">
                        <div class="w-1/2 px-10 pt-10 bg-center bg-contain bg-no-repeat rounded-2xl"
                            style="background-image: url('{{ asset('storage/eventFoto/'. $event->foto) }}')">
                            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                                class="invisible" />
                        </div>
                        <div class="w-1/2">
                            <h1 class="text-xl font-bold">{{ $bootcamp->namaBootcamp }}</h1>
                            <h1 class="text-lg font-medium">{{ $bootcamp->tanggal }}</h1>
                            <h1 class="text-lg font-medium"> Rp. {{ number_format($bootcamp->harga, 0, ',', '.') }}</h1>
                            <form action="{{ route('user.bootcamp.register') }}" method="post">
                                @csrf
                                <input type="hidden" name="bootcamp_id" value="{{ $bootcamp->id }}">
                                <button type="submit" class="btn bg-[#AC8039] text-white border-0">Daftar Sekarang</button>
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-5 mt-4">
                        <div class="flex items-center gap-x-5">
                            <h3 class="font-bold text-lg w-1/5">Prospek Karir</h3>
                            <p class="w-4/5">{{ $bootcamp->prospekKarier }}</p>
                        </div>
                        <div class="flex items-center gap-x-5">
                            <h3 class="font-bold text-lg w-1/5">Benefit Bootcamp</h3>
                            <p class="w-4/5">{{ $bootcamp->benefitBootcamp }}</p>
                        </div>
                        <div class="flex items-center gap-x-5">
                            <h3 class="font-bold text-lg w-1/5">Kurikulum Silabus</h3>
                            <p class="w-4/5">{{ $bootcamp->kurikulum_silabus }}</p>
                        </div>
                        <div class="flex items-center gap-x-5">
                            <h3 class="font-bold text-lg w-1/5">Sistem Belajar</h3>
                            <p class="w-4/5">{{ $bootcamp->sistemBelajar }}</p>
                        </div>
                    </div>
                </div>
                <label class="modal-backdrop" for="bootcampModal{{ $event->id }}">Close</label>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
