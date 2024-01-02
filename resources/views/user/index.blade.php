<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto ">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-[#133256]"> Halo, {{ auth()->user()->name }}!</h1>
                    <p>Hai Selamat datang di course LearnUMKM</p>
                </div>
            </div>
            <div class="flex gap-x-5 text-white mt-5">
                <div class="w-2/6">
                    <div class="bg-[#3257C0] p-5 flex items-center gap-x-5 justify-around shadow-sm rounded-lg">
                        <div>
                            <p class="font-bold text-xl">{{ auth()->user()->courseType }}</p>
                            <p>{{ auth()->user()->namaUMKM }}</p>
                        </div>
                        <div class="radial-progress" style="--value:{{$categoryProgress}};" role="progressbar">
                            {{$categoryProgress}}%</div>
                    </div>
                    <div class="bg-white p-5 shadow-sm rounded-lg text-gray-700 mt-5">
                        <h1 class="font-bold text-xl">Timeline</h1>
                        <hr>
                    </div>
                </div>
                <div class="w-4/6">
                    <div class="bg-[#00164E] p-5 shadow-sm rounded-lg">
                        <h1 class="font-bold text-xl">Courses</h1>
                        <p>Berikut List Course yang akan dipelajari!</p>
                        <div class="flex items-center w-full bg-[#DCE1FF] rounded-md px-2 mt-2">
                            <input type="text" class="bg-transparent w-full border-0 focus:ring-0 text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="black" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>
                        <div class="grid grid-cols-1 gap-y-3 mt-4">
                            @foreach($course as $data)
                            <div class="card card-side bg-base-100 shadow-xl rounded-2xl">
                                <div class="bg-center bg-contain bg-no-repeat bg-white rounded-l-2xl"
                                    style="background-image: url('{{ asset('storage/coursephoto/'. $data->file) }}')">
                                    <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg"
                                        alt="Movie" class="invisible" />
                                </div>
                                <div class="card-body bg-white rounded-r-2xl text-gray-700">
                                    <h2 class="card-title">{{ $data->courseName }}</h2>
                                    <p>Pemateri: {{ $data->namaPemateri }}</p>
                                    <p>{{substr($data->deskripsi, 0, 70) . '   ...'}}</p>
                                    <div class="card-actions flex items-center">
                                        <progress class="progress progress-info w-11/12" value="{{ $data->progress }}"
                                            max="100"></progress>
                                        <p class="text-sm font-medium">{{ $data->progress }}%</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-gray-700 flex flex-col gap-y-4">
                <h1 class="font-bold text-xl">Your Event & Bootcamp</h1>
                @foreach($events as $event)
                <div class="border-2 rounded-2xl p-5 bg-white w-full flex items-center gap-x-4 relative">
                    <div class="w-1/3 bg-center bg-contain bg-no-repeat rounded-2xl"
                        style="background-image: url('{{ asset('storage/eventFoto/'. $event->events->foto) }}')">
                        <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                            class="invisible" />
                    </div>
                    <div class="w-2/3">
                        <p class="flex items-center gap-x-3 text-lg font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                            </svg>
                            Nama Event: {{ $event->events->namaEvent }}
                        </p>
                        <p class="flex items-center gap-x-3 text-lg font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            Nama Pemateri: {{ $event->events->namaPemateri }}
                        </p>
                        <p class="flex items-center gap-x-3 text-lg font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            Tanggal Event: {{ $event->events->tanggal }}
                        </p>
                    </div>
                    <button class="btn bg-[#133256] border-0 absolute bottom-3 right-3 text-white">Confirm
                        Attendance</button>
                </div>
                @endforeach
                @foreach($bootcamps as $bootcamp)
                <div class="border-2 rounded-2xl p-5 bg-white w-full flex items-center gap-x-4 relative">
                    <div class="w-1/3 bg-center bg-contain bg-no-repeat rounded-2xl"
                        style="background-image: url('{{ asset('storage/bootcampFoto/'. $bootcamp->bootcamps->foto) }}')">
                        <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                            class="invisible" />
                    </div>
                    <div class="w-2/3">
                        <p class="flex items-center gap-x-3 text-lg font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                            </svg>
                            Nama Bootcamp: {{ $bootcamp->bootcamps->namaBootcamp }}
                        </p>
                        <p class="flex items-center gap-x-3 text-lg font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            Tanggal Bootcamp: {{ $bootcamp->bootcamps->tanggal }}
                        </p>
                    </div>
                    <button class="btn bg-[#133256] border-0 absolute bottom-3 right-3 text-white">Confirm
                        Attendance</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
