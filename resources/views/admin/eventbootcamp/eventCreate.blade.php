<style>
    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>
<x-app-layout>
    <div class="py-12 px-10 text-gray-700">
        <h1 class="text-xl font-bold">Tambah Event</h1>
        <p><a href="{{ route('admin.eventBootcamp') }}">Event & Bootcamp</a> / <a href="{{ route('admin.eventBootcamp.detail', $category->id) }}">{{ $category->name }}</a> / Event Create</p>

        <form action="{{ route('admin.event.store') }}" method="post" enctype="multipart/form-data"
            class="rounded-lg bg-[#133256] p-5 mt-5">
            @csrf
            <input type="hidden" name="category_id" value="{{ $category->id }}">
            <div>
                <x-input-label for="namaEvent" :value="__('Nama Event')" class="text-white" />
                <x-text-input id="namaEvent" class="block mt-1 w-full" type="text" name="namaEvent"
                    :value="old('namaEvent')" required autofocus />
                <x-input-error :messages="$errors->get('namaEvent')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="namaPemateri" :value="__('Nama Pemateri')" class="text-white" />
                <x-text-input id="namaPemateri" class="block mt-1 w-full" type="text" name="namaPemateri"
                    :value="old('namaPemateri')" required />
                <x-input-error :messages="$errors->get('namaPemateri')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="deskripsi" :value="__('Deskripsi Event')" class="text-white" />
                <textarea name="deskripsi" class="textarea textarea-bordered block mt-1 w-full bg-white"
                    placeholder="Deskripsi Event" required></textarea>
                <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="tanggal" :value="__('Tanggal Event')" class="text-white" />
                <input type="date" name="tanggal" class="file-input file-input-bordered block mt-1 w-full bg-white"
                    required />
                <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="harga" :value="__('harga')" class="text-white" />
                <input type="number" name="harga" class="file-input file-input-bordered block mt-1 w-full bg-white"
                    required />
                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="tempat/link" :value="__('Tempath Event/Link Meeting')" class="text-white" />
                <x-text-input id="tempat/link" class="block mt-1 w-full" type="text" name="tempatLink"
                    :value="old('tempat/link')" required />
                <x-input-error :messages="$errors->get('tempat/link')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="foto" :value="__('Foto Event')" class="text-white" />
                <input type="file" name="foto" class="file-input file-input-bordered block mt-1 w-full bg-white"
                    required />
                <x-input-error :messages="$errors->get('foto')" class="mt-2" />
            </div>
            <div class="flex gap-x-5 justify-center mt-5">
                <button class="btn bg-[#AC8039] text-white">Save</button>
                <label class="btn bg-[#E66D57] text-white">Cancel</label>
            </div>
        </form>
    </div>
</x-app-layout>
