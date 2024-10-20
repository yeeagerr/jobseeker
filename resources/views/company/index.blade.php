<x-app-layout>
    <x-slot name="title"> Company Seeker </x-slot>
    <header
        class="bg-[#22336A] items-center relative md:static min-h-[350px] mx-7 mb-5 rounded-2xl flex justify-between">
        <div class="ml-9 flex-[300px] mr-10 relative z-[2] md:z-0 md:static">
            <h1 class="text-white text-2xl md:text-5xl font-[700] tracking-wider mb-7">
                Cari Perusahaan yang cocok untuk Anda
            </h1>

            <form action="{{request()->url()}}" method="GET"
                class="bg-white flex items-center px-3 h-[50px] rounded-xl">
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                </button>
                <input type="search" name="SearchCompany" placeholder="Cari Perusahaan Yuk"
                    class="h-full w-full ml-5 font-bold text-lg focus:outline-none" />
            </form>
        </div>

        <img src="./images/man-stand-search-job.png" alt="searchjob" draggable="false"
            class="w-[350px] md:w-[400px] absolute md:static right-0 bottom-0" />
    </header>

    <main class="mx-7 mt-10">
        <div class="flex justify-between items-center flex-wrap">
            <div class="flex flex-col">
                <h1 class="font-bold text-3xl tracking-wide">
                    Rekomendasi List <span class="text-[#7384C5]">Perusahaan</span>
                </h1>

                <p class="text-[gray] tracking-wider">
                    Learn about new jobs, reviews, company culture, perks and benefits.
                </p>
            </div>

            <p class="text-lg">
                Di sortir:
                <a href="" class="font-bold cursor-pointer">Update Terbaru <i class="fa-solid fa-link"></i></a>
            </p>
        </div>

        <div class="flex items-center justify-center md:justify-start gap-3 mt-5 flex-wrap">
            @foreach ($companies as $company)
            @include('components.cardCompany')
            @endforeach
        </div>
    </main>
</x-app-layout>