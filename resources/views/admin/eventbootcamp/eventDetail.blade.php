<x-app-layout>
    <div class="py-12 px-10 text-gray-700">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-xl font-bold">{{ $event->namaEvent }}</h1>
                <p><a href="{{ route('admin.eventBootcamp') }}">Event & Bootcamp</a> / <a
                        href="{{ route('admin.eventBootcamp.detail', $category) }}">{{ $category->name }}</a> /
                    {{ $event->namaEvent }}</p>
            </div>
            <div class="flex items-center gap-x-2">
                <a href="{{ route('admin.event.edit', $event->id) }}" class="btn text-white btn-warning">Edit</a>
                <label for="deleteEventModal" class="btn text-white btn-error">Delete</label>

                <!-- Delete modal -->
                <input type="checkbox" id="deleteEventModal" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box bg-white">
                        <h3 class="font-bold text-lg text-center">Are you sure to delete {{ $event->namaEvent }} event?!
                        </h3>
                        <form action="{{ route('admin.event.destroy', $event->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="modal-action flex items-center justify-center gap-x-5">
                                <label for="deleteEventModal" class="btn">Close!</label>
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
                    style="background-image: url('{{ asset('storage/eventFoto/'. $event->foto) }}')">
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
                        {{ $event->tanggal }}
                    </div>
                </div>
                <div id="harga" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Harga
                    </div>
                    <div class="w-5/6">
                        Rp. {{ number_format($event->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div id="namaPemateri" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Nama Pemateri
                    </div>
                    <div class="w-5/6">
                        {{ $event->namaPemateri }}
                    </div>
                </div>
                <div id="benefitBootcamp" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Deskripsi Event
                    </div>
                    <div class="w-5/6">>
                        {{ $event->deskripsi }}
                    </div>
                </div>
                <div id="tempat/link" class="flex w-full items-center gap-x-5">
                    <div class="w-1/6 font-bold text-lg">
                        Tempat / Link
                    </div>
                    <div class="w-5/6">>
                        {{ $event->tempatLink }}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <h1 class="text-center text-xl font-medium mb-5">Peserta Event</h1>
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
