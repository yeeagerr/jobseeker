<x-app-layout>
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
                <p class="font-bold tracking-wider">Rp. 1jt - Rp. 10jt</p>
            </div>
            <input type="range"
                class="w-full appearance-none [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:bg-[#7384C5] [&::-webkit-slider-thumb]:w-[13px] [&::-webkit-slider-thumb]:h-[13px] [&::-webkit-slider-thumb]:rounded-full bg-[#D3E1F6] rounded-full h-[5px] cursor-pointer"
                step="1" max="10" value="0" />
        </div>
    </form>

    <main class="flex mt-8">
        <!-- LEFT -->
        <input type="checkbox" class="peer hidden" id="slidefilter" />
        <label for="slidefilter"
            class="h-[45px] fixed peer-checked:left-[280px] w-[45px] flex justify-center rounded-xl items-center bg-[#E2ECFE] cursor-pointer block md:hidden">
            <i class="fa-solid fa-arrow-right text-2xl"></i>
        </label>
        <section
            class="relative bg-[#f2f7fd] md:h-auto transition w-0 md:w-[280px] peer-checked:pl-[10px] peer-checked:w-[280px] peer-checked:fixed peer-checked:top-0 peer-checked:h-[100vh]">
            <!-- LIST FILTER -->
            <div class="flex flex-col border-r-[5px] overflow-hidden md:overflow-none border-r-[5px] md:px-5">
                <div class="flex items-center justify-between font-bold text-xl mt-10">
                    <h1>Filter</h1>
                    <p class="md:block hidden">></p>
                </div>

                <div class="flex flex-col mt-6">
                    <p class="text-[gray] text-lg font-[600]">Pilih jam kerja</p>

                    <div class="flex items-center mt-4">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Full Time</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Part Time</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Half Time</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Sekali Project</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Kapan Saja</p>
                    </div>
                </div>

                <div class="flex flex-col mt-6">
                    <p class="text-[gray] text-lg font-[600]">Tipe Pekerjaan</p>

                    <div class="flex items-center mt-4">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Full Time</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Part Time</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Half Time</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Sekali Project</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Kapan Saja</p>
                    </div>
                </div>

                <div class="flex flex-col mt-6">
                    <p class="text-[gray] text-lg font-[600]">
                        Tingkat Profesionalitas
                    </p>

                    <div class="flex items-center mt-4">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Full Time</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Part Time</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Half Time</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Sekali Project</p>
                    </div>

                    <div class="flex items-center mt-2">
                        <input type="checkbox" name=""
                            class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none mr-3"
                            id="" />
                        <p class="font-bold">Kapan Saja</p>
                    </div>
                </div>
            </div>
            <!-- LIST FILTER -->
        </section>

        <!-- RIGHT -->
        <section class="flex-[400px] px-3">
            <div class="flex items-center justify-between">
                <h1 class="text-lg md:text-3xl font-bold tracking-wide">
                    List Pekerjaan <span class="text-[#7384C5]">Rekomendasi</span>
                </h1>
                <p class="text-lg">
                    Di sortir: <strong>Update Terbaru</strong>
                    <i class="fa-solid fa-link"></i>
                </p>
            </div>

            <div class="flex items-center justify-center lg:justify-start mt-7 gap-5 flex-wrap">
                @include('components.cardJob-1')
                @include('components.cardJob-1')
                @include('components.cardJob-1')
                @include('components.cardJob-1')
                @include('components.cardJob-1')
                @include('components.cardJob-1')

            </div>
        </section>
    </main>
</x-app-layout>