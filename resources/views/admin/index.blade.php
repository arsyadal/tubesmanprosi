<x-app-layout>
    <div class="py-12 px-10">
        <div class="text-gray-700">
            <h1 class="text-2xl font-bold">Halo, {{ auth()->user()->name }}</h1>
            <p> Selamat datang di page Admin Dashboard</p>
        </div>
        <div class="mt-4 flex gap-x-5">
            <div class="w-2/12">
                <div class="bg-[#3257C0] p-4 text-white rounded-lg">
                    <h1 class="font-bold text-xl">Jumlah User</h1>
                    <button
                        class="btn text-white btn-primary flex items-center gap-x-2 bg-[#133256] border-white px-5 py-2 w-full rounded-lg mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                clip-rule="evenodd" />
                            <path
                                d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                        </svg>
                        {{ count($allUser) }} Peserta
                    </button>
                    <button
                        class="btn text-white btn-primary flex items-center gap-x-2 bg-[#F9432A] border-white px-5 py-2 mt-3 w-full rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                clip-rule="evenodd" />
                            <path
                                d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                        </svg>
                        {{ $pending }} Pending
                    </button>
                </div>
                <div class="border-2 bg-[#D9D9D9] p-4 mt-5 text-gray-700">
                    <h1 class="font-bold text-xl">Event</h1>
                </div>
            </div>
            <div class="w-10/12">
                <div class="border-2 bg-white text-gray-700 p-4">
                    <h1 class="font-bold text-2xl">Perkembangan LearnUMKM</h1>
                    <div class="flex flex-col gap-y-4 w-full mt-3">
                        <div class="flex justify-between gap-x-3 items-center">
                            <progress class="progress w-full h-10 progress-primary" value="{{ $goOnlineProgress }}" max="100"></progress>
                            <p class="font-bold text-2xl w-3/12 text-right">{{$goOnlineProgress}}% Go Online</p>
                        </div>
                        <div class="flex justify-between gap-x-3 items-center">
                            <progress class="progress w-full h-10 progress-primary" value="{{ $goModernProgress }}" max="100"></progress>
                            <p class="font-bold text-2xl w-3/12 text-right">{{$goModernProgress}}% Go Modern</p>
                        </div>
                        <div class="flex justify-between gap-x-3 items-center">
                            <progress class="progress w-full h-10 progress-primary" value="{{ $goGlobalProgress }}" max="100"></progress>
                            <p class="font-bold text-2xl w-3/12 text-right">{{$goGlobalProgress}}% Go Global</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h1 class="text-2xl font-bold text-gray-700">Update Courses</h1>
                    <div class="grid grid-cols-2 gap-8 mt-5">
                        @foreach($courseCategory as $data)
                        <div class="card shadow-xl bg-white border">
                            <div class="card-body text-gray-700">
                                <div class="flex justify-between items-center">
                                    <h2 class="card-title">{{ $data->name }}!</h2>
                                    <a href="{{ route('admin.course.detail', $data->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <figure>
                                <img src="{{ asset('assets/'. $data->file) }}" alt="Course Category" />
                            </figure>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
