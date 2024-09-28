<x-app-layout>
    <x-slot name="title"> Homepage </x-slot>

    <header class="bg-[#F2F7FD] h-[500px] md:h-[100vh]">
        <div class="relative flex flex-col justify-between h-full">
            <img draggable="false" src="./images/wave-tail-resp.png" alt="wavelineres"
                class="relative top-[-70px] h-[100vh] object-cover w-full md:hidden" />

            <img draggable="false" src="./images/md-wave-line.png" alt="wavelineres"
                class="relative top-[-70px] w-full md:block hidden h-full" />
        </div>

        <div class="absolute z-[1] h-[80vh] top-[90px] w-full flex justify-center md:my-[10vh] lg:my-[0px]">
            <div class="w-[90%] flex md:justify-center md:items-center md:gap-[100px]">
                <div class="w-full md:flex-[400px] flex flex-col justify-start items-center">
                    <h1 class="font-bold text-[28px] md:text-[50px] mt-4 w-full">
                        The
                        <div class="relative inline-block">
                            <span class="text-[#7384C5] relative z-[1] pl-1 pr-3">Easiest Way</span>
                            <span
                                class="absolute top-[-10px] left-0 right-0 bottom-0 border-b-[20px] border-[#E3E0FF] z-0"></span>
                        </div>
                        <br />
                        to Get Your New Job
                    </h1>

                    <p class="font-[500] tracking-wide mb-2">
                        Each month more than 3 milion job seekers turn to website in their
                        search for work. making over 140.000 applucations every single day
                    </p>

                    <div
                        class="bg-[#4567D6] flex justify-center items-center w-[150px] h-[150px] rounded-2xl md:hidden">
                        <img src="./images/sitdown.jpg" draggable="false" alt="womansit"
                            class="h-[90%] w-[90%] object-cover" />
                    </div>

                    <div class="w-full bg-[#C0D3F1] p-5 mt-5 rounded-xl">
                        <form action="" class="md:flex md:items-center flex-wrap md:gap-4">
                            <div class="flex bg-white md:flex-1 h-[45px] items-center relative px-2 rounded-xl">
                                <label for="spesialisasiinput">
                                    <img src="./images/spesialisasi.png" alt="spesialisasi" />
                                </label>
                                <select type="text" id="spesialisasiinput"
                                    class="bg-transparent ml-2 h-full focus:outline-none rounded-xl flex-[100px]">
                                    <option value="">Spesialisasi</option>
                                </select>
                                <div
                                    class="bg-white rounded-tr-lg rounded-br-lg px-3 h-full absolute right-1 flex justify-center items-center">
                                    <i class="fa-solid fa-arrow-right transform rotate-[90deg]"></i>
                                </div>
                            </div>

                            <div
                                class="flex mt-7 md:flex-1 md:mt-0 bg-white h-[45px] items-center relative px-2 rounded-xl">
                                <label for="lokasiinput">
                                    <img src="./images/target.png" alt="target" />
                                </label>
                                <select type="text" id="lokasiinput"
                                    class="bg-transparent ml-2 h-full focus:outline-none rounded-xl flex-[100px]">
                                    <option value="">Pilih Lokasi</option>
                                </select>
                                <div
                                    class="bg-white rounded-tr-lg rounded-br-lg px-3 h-full absolute right-1 flex justify-center items-center">
                                    <i class="fa-solid fa-arrow-right transform rotate-[90deg]"></i>
                                </div>
                            </div>

                            <button
                                class="bg-[#3C65FC] w-full mt-7 md:flex-1 md:mt-0 text-white h-[45px] rounded-xl flex justify-between px-5 items-center">
                                Search
                                <i
                                    class="fa-solid fa-magnifying-glass text-black border-l-2 border-black pl-2 text-xl"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="bg-[#4567D6] justify-center items-center w-[350px] h-[450px] rounded-xl hidden md:flex">
                    <div class="h-full w-full">
                        <img src="./images/sitdown.jpg" alt="womansit2" draggable="false"
                            class="w-full h-full object-cover" />
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- <div class="h-[150px]"></div> -->

    <h2 class="font-bold text-lg md:text-[50px] leading-tight tracking-wide text-center mt-[120px] text-[#364458]">
        Beberapa Perusahaan Yang Mungkin <br />
        Anda Minati
    </h2>
    <p class="text-center">
        Cari pekerjaan yang cocok dengan kamu, ada lebih dari 800+ perusahaan
    </p>

    <p class="text-end mr-3 text-[#114FA9] font-bold tracking-wider mt-10">
        Seluruh Kategori :
    </p>

    <section class="flex justify-evenly flex-wrap items-start mt-5">
        @foreach ($jobs as $job)
        @include('components.cardJob-1')
        @endforeach
    </section>

    <h2 class="text-[#364458] text-2xl md:text-[50px] leading-tight font-bold tracking-wider text-center mt-10">
        Pilih Kategori Kamu
    </h2>
    <p class="text-center text-[#364458]">
        Cari pekerjaan yang cocok dengan kamu, ada lebih dari 800+ perusahaan
    </p>

    <section class="flex items-center justify-center gap-3 mt-7 px-5 flex-wrap">
        <div class="bg-[#E2ECFE] flex-[260px] flex items-center flex-col py-3 rounded-xl">
            <img src="./images/komputerp.png" alt="kategori" width="80" />
            <p class="text-xl font-bold tracking-wider">Programmer</p>
        </div>

        <div class="bg-[#E2ECFE] flex-[260px] flex items-center flex-col py-3 rounded-xl">
            <img src="./images/komputerp.png" alt="kategori" width="80" />
            <p class="text-xl font-bold tracking-wider">Programmer</p>
        </div>

        <div class="bg-[#E2ECFE] flex-[260px] flex items-center flex-col py-3 rounded-xl">
            <img src="./images/komputerp.png" alt="kategori" width="80" />
            <p class="text-xl font-bold tracking-wider">Programmer</p>
        </div>
    </section>
</x-app-layout>