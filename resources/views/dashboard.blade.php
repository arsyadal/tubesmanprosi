<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto ">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-[#133256]"> Halo, {{ auth()->user()->name }}!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="flex gap-x-5 text-white mt-5">
                <div class="w-2/6">
                    <div class="bg-[#3257C0] p-5 flex items-center gap-x-5 justify-around shadow-sm rounded-lg">
                        <div>
                            <p class="font-bold text-xl">{{ auth()->user()->courseType }}</p>
                            <p>{{ auth()->user()->namaUMKM }}</p>
                        </div>
                        <div class="radial-progress" style="--value:70;" role="progressbar">70%</div>
                    </div>
                </div>
                <div class="w-4/6">
                    <div class="bg-[#00164E] p-5 shadow-sm rounded-lg">
                        <h1 class="font-bold text-xl">Courses</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
