<x-app-layout>
    <div class="py-12 px-10 text-gray-700">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">List Course {{ $courseCategory->name }}</h1>
            <button class="btn flex items-center gap-x-2">
                <p>Create Modul</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </button>
        </div>
        <div>

        </div>
    </div>
</x-app-layout>
