<x-app-layout>
    <div class="py-12 px-10 text-gray-700">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-xl font-bold">{{ $bootcamp->namaBootcamp }}</h1>
                <p><a href="{{ route('admin.eventBootcamp') }}">Event & Bootcamp</a> / <a
                        href="{{ route('admin.eventBootcamp.detail', $category) }}">{{ $category->name }}</a> /
                    {{ $bootcamp->namaBootcamp }}</p>
            </div>
            <div class="flex items-center gap-x-2">
                <a href="{{ route('admin.bootcamp.edit', $bootcamp->id) }}" class="btn text-white btn-warning">Edit</a>
                <label for="deleteBootcampModal" class="btn text-white btn-error">Delete</label>

                <!-- Delete modal -->
                <input type="checkbox" id="deleteBootcampModal" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box bg-white">
                        <h3 class="font-bold text-lg text-center">Are you sure to delete {{ $bootcamp->namaBootcamp }} bootcamp?!
                        </h3>
                        <form action="{{ route('admin.bootcamp.destroy', $bootcamp->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="modal-action flex items-center justify-center gap-x-5">
                                <label for="deleteBootcampModal" class="btn">Close!</label>
                                <button class="btn btn-error text-white">Delete!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <div class="flex justify-center">
                <div class="w-1/4 bg-center bg-contain bg-no-repeat"
                    style="background-image: url('{{ asset('storage/bootcampFoto/'. $bootcamp->foto) }}')">
                    <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                        class="invisible" />
                </div>
            </div>
            <div class="mt-5 flex flex-col gap-y-10">
                <div id="tanggal" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Tanggal
                    </div>
                    <div>
                        {{ $bootcamp->tanggal }}
                    </div>
                </div>
                <div id="harga" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Harga
                    </div>
                    <div class="w-5/6">
                        Rp. {{ number_format($bootcamp->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div id="prospekKarier" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Prospek Karrier
                    </div>
                    <div class="w-5/6">
                        {{ $bootcamp->prospekKarier }}
                    </div>
                </div>
                <div id="benefitBootcamp" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Benefit Bootcamp
                    </div>
                    <div class="w-5/6">>
                        {{ $bootcamp->benefitBootcamp }}
                    </div>
                </div>
                <div id="kurikulum_silabus" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Kurikulum Silabus
                    </div>
                    <div class="w-5/6">>
                        {{ $bootcamp->kurikulum_silabus }}
                    </div>
                </div>
                <div id="sistemBelajar" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Sistem Belajar
                    </div>
                    <div class="w-5/6">>
                        {{ $bootcamp->sistemBelajar }}
                    </div>
                </div>
                <div id="faq" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        FAQ
                    </div>
                    <div class="w-5/6">>
                        {{ $bootcamp->faq }}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <h1 class="text-center text-xl font-medium mb-5">Peserta Bootcamp</h1>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama UMKM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pendaftaran
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($audience as $key => $data)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $key+1 }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->users->name }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $data->users->namaUMKM }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $data->created_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
