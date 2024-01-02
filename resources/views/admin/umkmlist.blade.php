<x-app-layout>
    <div class="py-12 px-10 text-gray-700">
        <h1 class="text-2xl font-bold">Halo, {{ auth()->user()->name }}</h1>
        <p> Selamat datang di page Admin Dashboard</p>
        <div class="bg-[#3257C0] p-5 text-white grid grid-cols-4 gap-x-5 rounded-xl mt-5">
            <div class="text-center font-bold text-xl">
                <h1>Total UMKM</h1>
                <p>{{ count($umkmlist) }}</p>
            </div>
            <div class="text-center font-bold text-xl">
                <h1>Go Modern</h1>
                <p>{{ count($goModern) }}</p>
            </div>
            <div class="text-center font-bold text-xl">
                <h1>Go Online</h1>
                <p>{{ count($goOnline) }}</p>
            </div>
            <div class="text-center font-bold text-xl">
                <h1>Go Global</h1>
                <p>{{ count($goGlobal) }}</p>
            </div>
        </div>


        <div class="relative overflow-x-auto mt-5 rounded-xl">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama UMKM
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Usaha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Skala Usaha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No. Telp
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Progress
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($umkmlist as $key => $value)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $key+1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $value->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->namaUMKM }}
                        </td>
                        <td class="px-6 py-4">
                         {{ $value->jenisUMKM }}
                        </td>
                        <td class="px-6 py-4">
                         {{ $value->skalaUMKM }}
                        </td>
                        <td class="px-6 py-4">
                         {{ $value->nomorUMKM }}
                        </td>
                        <td class="px-6 py-4">
                         {{ $value->courseType }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
