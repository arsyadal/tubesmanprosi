<style>
    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>
<x-app-layout>
    <div class="py-12 px-10 text-gray-700">
        <h1 class="text-xl font-bold">Edit Bootcamp</h1>
        <p><a href="{{ route('admin.eventBootcamp') }}">Event & Bootcamp</a> / <a href="{{ route('admin.eventBootcamp.detail', $category) }}">{{ $category->name }}</a> / Bootcamp Edit</p>

        <form action="{{ route('admin.bootcamp.update', $bootcamp->id) }}" method="post" enctype="multipart/form-data"
            class="rounded-lg bg-[#133256] p-5 mt-5">
            @csrf
            <div>
                <x-input-label for="namaBootcamp" :value="__('Nama Bootcamp')" class="text-white" />
                <x-text-input id="namaBootcamp" class="block mt-1 w-full" type="text" name="namaBootcamp"
                    :value="$bootcamp->namaBootcamp" required autofocus />
                <x-input-error :messages="$errors->get('namaBootcamp')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="prospekKarier" :value="__('Prospek Karrier')" class="text-white" />
                <textarea name="prospekKarier" class="textarea textarea-bordered block mt-1 w-full bg-white"
                    placeholder="Prospek Karrier" required>{{ $bootcamp->prospekKarier }}</textarea>
                <x-input-error :messages="$errors->get('prospekKarier')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="benefitBootcamp" :value="__('Benefit Bootcamp')" class="text-white" />
                <textarea name="benefitBootcamp" class="textarea textarea-bordered block mt-1 w-full bg-white"
                    placeholder="Benerfit Bootcamp" required>{{ $bootcamp->benefitBootcamp }}</textarea>
                <x-input-error :messages="$errors->get('benefitBootcamp')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="kurikulum_silabus" :value="__('Kurikulum Silabus')" class="text-white" />
                <textarea name="kurikulum_silabus" class="textarea textarea-bordered block mt-1 w-full bg-white"
                    placeholder="Kurikulum Silabus" required>{{ $bootcamp->kurikulum_silabus }}</textarea>
                <x-input-error :messages="$errors->get('kurikulum_silabus')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="sistemBelajar" :value="__('Sistem Belajar')" class="text-white" />
                <textarea name="sistemBelajar" class="textarea textarea-bordered block mt-1 w-full bg-white"
                    placeholder="Sistem Belajar" required>{{ $bootcamp->sistemBelajar }}</textarea>
                <x-input-error :messages="$errors->get('sistemBelajar')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="tanggal" :value="__('Tanggal')" class="text-white" />
                <x-text-input id="tanggal" class="block mt-1 w-full" type="date" name="tanggal"
                    :value="$bootcamp->tanggal" required />
                <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="harga" :value="__('Harga')" class="text-white" />
                <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga"
                    :value="$bootcamp->harga" required />
                <x-input-error :messages="$errors->get('faq')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="faq" :value="__('FAQ')" class="text-white" />
                <x-text-input id="faq" class="block mt-1 w-full" type="text" name="faq"
                    :value="$bootcamp->faq" required />
                <x-input-error :messages="$errors->get('faq')" class="mt-2" />
            </div>
                <div class="mt-4">
                <x-input-label for="forum" :value="__('Forum')" class="text-white" />
                <x-text-input id="forum" class="block mt-1 w-full" type="text" name="forum"
                    :value="$bootcamp->forum" required />
                <x-input-error :messages="$errors->get('forum')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="foto" :value="__('Foto Event')" class="text-white" />
                <input type="file" name="foto" class="file-input file-input-bordered block mt-1 w-full bg-white" />
                <x-input-error :messages="$errors->get('foto')" class="mt-2" />
            </div>
            <div class="flex gap-x-5 justify-center mt-5">
                <button class="btn bg-[#AC8039] text-white">Edit</button>
            </div>
        </form>
    </div>
</x-app-layout>