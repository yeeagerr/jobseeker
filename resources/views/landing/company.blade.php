<x-app-layout>
    <x-slot name="title"> Homepage </x-slot>

    <header class="bg-[#F2F7FD] h-[500px] md:h-[100vh]">
        <img draggable="false" src="../images/wave-tail-resp.png" alt="wavelineres"
            class="relative top-[-70px] w-full md:hidden" />

        <img draggable="false" src="../images/md-wave-line.png" alt="wavelineres"
            class="relative top-[-70px] w-full md:block hidden h-full" />

        <div class="absolute z-[1] h-[80vh] top-[90px] w-full flex justify-center">
            <div class="w-[90%] flex md:justify-center md:items-center md:gap-[100px]">
                <div class="w-full md:flex-[400px] flex flex-col justify-start items-center">
                    <h1 class="font-bold text-[28px] md:text-[50px] mt-4 w-full">
                        <div class="relative inline-block">
                            Rek<span class="text-[#7384C5] relative z-[1] pr-3">rut Kandidat</span>
                            <span
                                class="absolute top-[-10px] left-[85px] right-0 bottom-0 border-b-[20px] border-[#E3E0FF] z-0"></span>
                        </div>
                        <br />
                        Yang Tepat Untuk Bisnis Anda
                    </h1>

                    <p class="font-[500] tracking-wide mb-2">
                        Pencarian kandidat yang tepat menjadi lebih cepat dan mudah
                    </p>

                    <div
                        class="bg-[#22336A] flex justify-center items-center w-[150px] h-[150px] rounded-2xl md:hidden">
                        <img src="{{asset('./images/mansit.png')}}" draggable="false" alt="womansit"
                            class="h-[90%] w-[90%] object-contain" />
                    </div>
                    <div class="w-full bg-[#C0D3F1] p-5 mt-5 rounded-xl">
                        <form action="" class="md:flex md:items-center md:gap-4">
                            <div class="flex bg-white md:flex-1 h-[45px] items-center relative px-2 rounded-xl">
                                <label for="spesialisasiinput">
                                    <img src="../images/spesialisasi.png" alt="spesialisasi" />
                                </label>
                                <select type="text" id="spesialisasiinput"
                                    class="bg-transparent ml-2 h-full focus:outline-none rounded-xl w-full">
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
                                    <img src="../images/target.png" alt="target" />
                                </label>
                                <select type="text" id="lokasiinput"
                                    class="bg-transparent ml-2 h-full focus:outline-none rounded-xl w-full">
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

                <div
                    class="bg-[#22336A] flex justify-center items-center w-[350px] h-[450px] rounded-xl hidden md:block">
                    <div class="w-[350px] h-[400px] flex items-end">
                        <img src="{{asset('./images/mansit.png')}}" alt="womansit2" draggable="false"
                            class="w-[90%] h-[90%] object-contain" />
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- <div class="h-[150px]"></div> -->

    <h2 class="font-bold text-lg md:text-[50px] leading-tight tracking-wide text-center mt-[120px] text-[#364458]">
        Daftar Pekerja Yang Rekomendasi Untuk <br />
        Perusahaan Kamu
    </h2>
    <p class="text-center">
        Berikut terdapat berberapa list pekerjaan yang rekomendasi untuk kamu
    </p>

    <p class="text-end mr-3 text-[#114FA9] font-bold tracking-wider mt-10">
        Seluruh Kategori :
    </p>

    <section class="flex justify-evenly flex-wrap items-center mt-5">
        @foreach ($seeker as $s)
        @include('components.cardUser')
        @endforeach
    </section>

    <h2 class="text-[#364458] text-2xl md:text-[50px] leading-tight font-bold tracking-wider text-center mt-10">
        Mulai mencari pekerja dengan 3 Step
    </h2>

    <section class="flex items-center justify-center gap-3 mt-7 px-5 flex-wrap">
        <div class="bg-[#E2ECFE] flex-[260px] flex items-center flex-col py-3 rounded-xl">
            <div
                class="bg-[#7384C5] text-xl font-bold w-[50px] h-[50px] rounded-full flex justify-center items-center text-white">
                1
            </div>
            <p class="text-xl font-bold tracking-wider">Register securely online</p>
        </div>

        <div class="bg-[#E2ECFE] flex-[260px] flex items-center flex-col py-3 rounded-xl">
            <div
                class="bg-[#7384C5] text-xl font-bold w-[50px] h-[50px] rounded-full flex justify-center items-center text-white">
                1
            </div>
            <p class="text-xl font-bold tracking-wider">Register securely online</p>
        </div>

        <div class="bg-[#E2ECFE] flex-[260px] flex items-center flex-col py-3 rounded-xl">
            <div
                class="bg-[#7384C5] text-xl font-bold w-[50px] h-[50px] rounded-full flex justify-center items-center text-white">
                1
            </div>
            <p class="text-xl font-bold tracking-wider">Register securely online</p>
        </div>
    </section>

    <center>
        <button class="bg-[#4A3AFF] p-3 mt-10 rounded-2xl text-white">
            Buat profile sekarang juga
        </button>
    </center>
</x-app-layout>