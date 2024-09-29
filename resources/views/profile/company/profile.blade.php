<x-app-layout>
    <x-slot name="title"> Profile - Company </x-slot>


    <header class="bg-[#E2ECFE] py-5 flex justify-center items-center">
        <div class="w-[85%] h-full flex items-center">
            <div class="w-[90px] h-[90px] mr-5 ">
                <img src="{{$id->logo ?? null ? asset('./company.logo/' . $id->logo ) : "
                    /images/user-icon-default.png"}}" class="w-full h-full object-cover rounded-full"
                    alt="companyLogo" />
            </div>
            <div>
                <h1 class="text-2xl tracking-wider text-[#114FA9]">
                    {{$id->nama}}
                </h1>
                <div class="mt-1 text-[gray] opacity-[70%] flex items-center gap-1">
                    <i class="fa-solid fa-bullseye"></i>
                    <p class="tracking-wider">{{$id->lokasi}}</p>
                </div>
            </div>
        </div>
    </header>

    <div class="flex justify-center items-center mt-6">
        <div class="bg-[#E2ECFE] w-[85%] h-[300px] rounded-xl p-5">
            <img src="{{$id->banner ?? null ? asset('./company.banner/' . $id->banner ) : "
                ./images/user-icon-default.png"}}" class="w-full object-cover h-full rounded-xl" />
        </div>
    </div>

    <div class="mt-6 flex justify-center ">
        <div class="w-[90%]">
            <div class="flex justify-between items-center">
                <div>
                    <div class="w-[80px] h-[80px]">
                        <img src="{{$id->logo ?? null ? asset('./company.logo/' . $id->logo ) : "
                            ./images/user-icon-default.png"}}" alt="googlelogo"
                            class="w-full h-full rounded-full object-cover" />
                    </div>
                    <h1 class="text-[#114FA9] tracking-wider text-2xl">
                        {{$id->nama}}

                    </h1>

                    <div class="flex items-center justify-start gap-3">
                        <img src="{{asset('images/bintang/bintang0.png')}}" alt="rating" class="mt-1" width="110px" />
                        <p class="text-[gray]">6.0 total rating from {{count($id->has_review)}} reviews</p>
                    </div>
                </div>

                @if (Auth::guard('company')->check() AND Auth::guard('company')->user()->id == $id->id)
                <div id="switchBtn">
                    <button onclick="window.location.href = '{{route('company.edit')}}'"
                        class="bg-indigo-600 text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Edit Profile Perusahaan
                    </button>
                </div>
                @endif
            </div>
            <div class="mt-5 flex flex-col">
                <div class="flex">
                    <label for="about">
                        <p class="font-bold text-lg md:text-2xl tracking-wide w-[90px] md:w-[150px] cursor-pointer">
                            About
                        </p>
                    </label>

                    <label for="jobs">
                        <p class="font-bold text-lg md:text-2xl tracking-wide w-[90px] md:w-[150px] cursor-pointer">
                            Jobs
                        </p>
                    </label>

                    <label for="review">
                        <p class="font-bold text-lg md:text-2xl tracking-wide w-[90px] md:w-[150px] cursor-pointer">
                            Reviews
                        </p>
                    </label>
                    <label for="list">
                        <p
                            class="font-bold text-lg md:text-2xl tracking-wide w-[90px] md:w-[150px] cursor-pointer whitespace-nowrap">
                            list pendaftar
                        </p>
                    </label>
                </div>
                <div class="relative bg-[#5070D8] w-full h-[3px] rouded-full my-2">
                    <input type="radio" name="radioTipe" id="about" checked class="peer/about hidden" />
                    <input type="radio" name="radioTipe" id="jobs" class="peer/jobs hidden" />
                    <input type="radio" name="radioTipe" id="review" class="peer/review hidden" />
                    <input type="radio" name="radioTipe" id="list" class="peer/list hidden" />

                    <div
                        class="absolute h-[10px] w-[65px] rounded-2xl bg-[#22336A] top-[-4px] transform peer-checked/about:translate-x-[0px] peer-checked/jobs:translate-x-[85px] md:peer-checked/jobs:translate-x-[145px] peer-checked/review:translate-x-[180px] md:peer-checked/review:translate-x-[315px] transition">
                    </div>
                    <div class="">

                    </div>
                    <!-- ABOUT -->
                    <div class="mt-5 hidden peer-checked/about:block peer-checked/jobs:hidden">
                        <h1 class="text-2xl font-bold tracking-wide">
                            Preview Perusahaan
                        </h1>
                        <div class="flex mt-3">
                            <p class="font-bold text-sm md:text-lg tracking-wider w-[150px] md:w-[250px]">
                                Webiste
                            </p>
                            <p class="text-sm md:text-lg">: {{$id->link}}</p>
                        </div>
                        <div class="flex">
                            <p class="font-bold text-sm md:text-lg tracking-wider w-[150px] md:w-[250px]">
                                Industry
                            </p>
                            <p class="text-sm md:text-lg">: {{$id->industri}}</p>
                        </div>
                        <div class="flex">
                            <p class="font-bold text-sm md:text-lg tracking-wider w-[150px] md:w-[250px]">
                                Company Size
                            </p>
                            <p class="text-sm md:text-lg">: {{$id->size}}</p>
                        </div>

                        <div class="flex">
                            <p class="font-bold text-sm md:text-lg tracking-wider w-[150px] md:w-[250px]">
                                Primary Location
                            </p>
                            <p class="text-sm md:text-lg w-[60%] h-auto">
                                : {{$id->lokasi}}
                            </p>
                        </div>

                        <p class="text-lg mt-5">
                            {{$id->deskripsi}}
                        </p>
                    </div>
                    <!-- ABOUT -->

                    <!-- JOBS -->
                    <div class="mt-5 hidden peer-checked/jobs:block peer-checked/about:hidden">
                        <h1 class="text-2xl font-bold tracking-wide">
                            Berberapa Pekerjaan
                        </h1>
                        <h1 class="text-xl font-bold flex justify-end text-[#114FA9] ">
                            Seluruh Kategori :
                        </h1>

                        <div class="mt-5 flex justify-center items-start gap-5 flex-wrap">
                            <!-- CARD -->
                            @foreach ($jobs as $job)
                            @include('components.cardJob-2')
                            @endforeach
                            <!-- CARD -->
                        </div>
                    </div>
                    <!-- JOBS -->

                    <!--review-->
                    <div class="mt-5 hidden peer-checked/jobs:hidden  peer-checked/review:block">
                        <p class="text-end mr-5 tracking-wider mt-10">
                            Di sortir :
                            <span class="font-bold">
                                paling membantu
                            </span>
                        </p>
                        <h3 class="text-2xl tracking-wide">
                            Showing <span class="font-bold">6</span> Reviews sorted by most recent
                        </h3>
                        <h1 class="text-3xl font-bold tracking-wider mr-5 mt-10 text-[#133240]">
                            BEBERAPA FEEDBACK
                        </h1>
                        <h4 class="text-l tracking-wider mr-5 mt-5 text-[#133240]">
                            Your trust is our main concern so these ratings for
                            <span class="font-bold">Google Group</span>
                            are shared as-is from employees in line with our community guidelines
                        </h4>
                        <div class="w-[300px] h-[350px] rounded overflow-hidden shadow-lg p-4 border mt-10 ml-10">
                            <div class="flex items-center mb-4">
                                <img class="w-[80px] h-[80px] mb-2 mr-2" src="https://via.placeholder.com/48"
                                    alt="Avatar">
                                <div class=" w-[150px] ml-10">
                                    <img src="./images/bintang/bintang4.png" alt="Bintang">
                                </div>
                            </div>
                            <h2 class="font-semibold text-2xl">Floyd Miles
                            </h2>
                            <button class="bg-red-500 hover:bg-red-600 text-white font-semi py-2 px-4 rounded-3xl mt-3">
                                Delete
                            </button>
                            <p class="text-gray-700 mt-3">
                                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia
                                consequat duis enim velit mollit.
                            </p>
                        </div>

                    </div>


                    <!--review-->

                    <!--list pendaftar-->
                    <!--list pendaftar-->

                    <!-- JARAK BAWAH -->
                    <div class="h-[45px]">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>