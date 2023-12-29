<x-app-layout>
    <div class="py-12 px-10 text-gray-700">
        <h1 class="text-xl font-bold">Tambah Modul Question</h1>
        <p><a href="{{ route('admin.course') }}">Course</a> / <a href="{{ route('admin.course.detail', $courseCategory->id)  }}">
            {{ $courseCategory->name }}</a> / <a href="{{ route('admin.course.detailCourse', $course->id) }}">{{ $course->courseName }}</a></p>
        <form action="{{ route('admin.modul.question.store') }}" method="post" enctype="multipart/form-data"
            class="rounded-lg bg-[#133256] p-5 mt-5">
            @csrf
            <div>
                <input type="hidden" name="modul_id" value="{{ $modul->id }}">
                <x-input-label for="namaModul" :value="__('Nama Modul')" class="text-white" />
                <select name="modulType" id="select"
                    class="bg-white p-2 block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Select Modul Type</option>
                    <option value="Presentation Materi">Presentation Materi</option>
                    <option value="Materi PDF">Materi PDF</option>
                    <option value="Post-Test">Post-Test</option>
                    <option value="Video">Video</option>
                </select>
                <x-input-error :messages="$errors->get('namaModul')" class="mt-2" />
            </div>
            <div class="mt-4" id="materi">
                <x-input-label for="materi" :value="__('File Materi')" class="text-white" />
                <!-- <input id="materi" class="block mt-1 w-full" type="file" name="materi"
                    :value="old('materi')" required /> -->
                <input type="file" class="file-input file-input-bordered w-full bg-white " 
                        name="materi" :value="old('materi')" required/>
                <x-input-error :messages="$errors->get('materi')" class="mt-2" />
            </div>
            <div class="mt-4" id="deskripsi">
                <x-input-label for="deskripsi" :value="__('Deskripsi Materi')" class="text-white" />
                <textarea id="deskripsi" class="bg-white p-2 block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" 
                name="deskripsi" :value="old('deskripsi')" required></textarea>
                <x-input-error :messages="$errors->get('materi')" class="mt-2" />
            </div>
            <!-- <div class="mt-4 hidden" id="materiPDF">
                <x-input-label for="materiPDF" :value="__('Materi PDF')" class="text-white" />
                <input name="materiPDF"
                    class="bg-white p-2 block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    type="file" placeholder="Materi PDF" required />
                <x-input-error :messages="$errors->get('materiPDF')" class="mt-2" />
            </div>
            <div class="mt-4 hidden" id="exerciseTugas">
                <x-input-label for="exerciseTugas" :value="__('Exercise/Tugas')" class="text-white" />
                <x-text-input type="exerciseTugas" name="exerciseTugas" class="block mt-1 w-full" type="text"
                    required />
                <x-input-error :messages="$errors->get('exerciseTugas')" class="mt-2" />
            </div>
            <div class="mt-4 hidden" id="videoMateri">
                <x-input-label for="videoMateri" :value="__('Video Materi')" class="text-white" />
                <x-text-input type="text" name="videoMateri" class="block mt-1 w-full" required />
                <x-input-error :messages="$errors->get('videoMateri')" class="mt-2" />
            </div> -->
            <div class="flex justify-center mt-5">
                <button type="submit" class="btn bg-[#AC8039] text-white">Save</button>
            </div>
        </form>
    </div>
    <!-- <script>
        const el = document.getElementById('select');
        const presentasionMateri = document.getElementById('presentationMateri');
        const materiPDF = document.getElementById('materiPDF');
        const exerciseTugas = document.getElementById('exerciseTugas');
        const videoMateri = document.getElementById('videoMateri');

        el.addEventListener('change', function handleChange(event) {
            if (event.target.value === 'Presentation Materi') {
                presentasionMateri.style.display = 'block';
                materiPDF.style.display = 'none';
                exerciseTugas.style.display = 'none';
                videoMateri.style.display = 'none';
            } else if(event.target.value === 'Video') {
                presentasionMateri.style.display = 'none';
                materiPDF.style.display = 'none';
                exerciseTugas.style.display = 'none';
                videoMateri.style.display = 'block';
            } else if(event.target.value === 'Post-Test'){
                presentasionMateri.style.display = 'none';
                materiPDF.style.display = 'none';
                exerciseTugas.style.display = 'block';
                videoMateri.style.display = 'none';
            } else if(event.target.value === 'Materi PDF'){
                presentasionMateri.style.display = 'none';
                materiPDF.style.display = 'block';
                exerciseTugas.style.display = 'none';
                videoMateri.style.display = 'none';
            } else{
                presentasionMateri.style.display = 'none';
                materiPDF.style.display = 'none';
                exerciseTugas.style.display = 'none';
                videoMateri.style.display = 'none';
            }
        });

    </script> -->
</x-app-layout>
