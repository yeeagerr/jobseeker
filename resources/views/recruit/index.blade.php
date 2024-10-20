<x-app-layout title="Job List">
    <x-slot name="title"> Seek Jobs </x-slot>


    <form class="px-5 py-8 flex gap-5 items-center border-[#C0D3F1] border-t-[3px] bg-white w-full flex-wrap">
        <div class="flex relative flex-[200px] border-r-2">
            <div class="h-[50px] flex justify-center items-center w-[50px] bg-[#CEDEF7] rounded-full">
                <i class="fa-solid fa-briefcase text-black text-2xl"></i>
            </div>
            <select name="" class="bg-transparent w-full ml-2 focus:outline-none rounded-xl" id="">
                <option class="border-none">Pilih Spesialisasi</option>
                <option value=""></option>
            </select>
            <div class="bg-white px-3 h-full absolute right-0 flex justify-center items-center">
                <i class="fa-solid fa-arrow-right transform rotate-[90deg]"></i>
            </div>
        </div>

        <div class="flex relative flex-[200px] border-r-2">
            <div class="h-[50px] flex justify-center items-center w-[50px] bg-[#CEDEF7] rounded-full">
                <i class="fa-solid fa-bullseye text-black text-2xl"></i>
            </div>
            <select name="" class="bg-transparent w-full ml-2 focus:outline-none rounded-xl" id="">
                <option class="border-none">Pilih Lokasi</option>
                <option value=""></option>
            </select>
            <div class="bg-white px-3 h-full absolute right-0 flex justify-center items-center">
                <i class="fa-solid fa-arrow-right transform rotate-[90deg]"></i>
            </div>
        </div>

        <button
            class="bg-[#3C65FC] w-full mt-7 md:flex-1 md:mt-0 text-white h-[45px] rounded-xl flex justify-between px-5 items-center">
            Search
            <i class="fa-solid fa-magnifying-glass text-black border-l-2 border-black pl-2 text-xl"></i>
        </button>

        <div class="flex-[300px] md:border-l-2 md:pl-5 flex-col items-center justify-center">
            <div class="flex justify-between">
                <p class="font-bold tracking-wider">Jangkauan Gaji</p>
                <p class="font-bold tracking-wider">Rp. <span id="ammount">1</span>jt - Rp. 10jt</p>
            </div>
            <input type="range" id="rangeRp"
                class="w-full appearance-none [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:bg-[#7384C5] [&::-webkit-slider-thumb]:w-[13px] [&::-webkit-slider-thumb]:h-[13px] [&::-webkit-slider-thumb]:rounded-full bg-[#D3E1F6] rounded-full h-[5px] cursor-pointer"
                step="1" min="1" max="10" value="0" />
        </div>

        <script>
            const amount = document.getElementById("ammount");
            const range = document.getElementById("rangeRp");
            range.addEventListener("change", () => {
                ammount.innerHTML = range.value;
            });
        </script>
    </form>

    <main class="flex mt-8">
        <!-- LEFT -->
        <input type="checkbox" class="peer hidden" id="slidefilter" />
        <label for="slidefilter"
            class="h-[45px] fixed peer-checked:left-[280px] w-[45px] flex justify-center rounded-xl items-center bg-[#E2ECFE] cursor-pointer block md:hidden">
            <i class="fa-solid fa-arrow-right text-2xl"></i>
        </label>

        <!-- RIGHT -->
        <section class="flex-[400px] px-3">
            <div class="flex items-center justify-between">
                <h1 class="text-lg md:text-3xl font-bold tracking-wide">
                    List Pekerja <span class="text-[#7384C5]">Rekomendasi</span>
                </h1>
                <p class="text-lg">
                    Di sortir: <strong>Update Terbaru</strong>
                    <i class="fa-solid fa-link"></i>
                </p>
            </div>

            <div class="flex items-stretch justify-center lg:justify-start mt-7 gap-5 flex-wrap" id="list_job">
                @foreach ($pelamar as $s)
                @include('components.cardUser')
                @endforeach
            </div>
        </section>
    </main>
</x-app-layout>