<x-app-layout>
    <x-slot name="title"> Profile - Company </x-slot>


    <x-header-title :title="$id->nama" :logo="asset('/company.logo/' . $id->logo)" :lokasi="$id->lokasi" />


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
                        <img src="{{asset('images/bintang/bintang'. $averageRating .'.png')}}" alt="rating" class="mt-1"
                            width="110px" />
                        <p class="text-[gray]">{{$averageRating . ".0"}} total rating from {{count($id->has_review)}}
                            reviews</p>
                    </div>
                </div>

                @if (Auth::guard('company')->check() AND Auth::guard('company')->user()->id == $id->id)
                <div id="switchBtn">
                    <button onclick="window.location.href = '{{route('company.edit')}}'"
                        class="bg-indigo-600 text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Edit Profile Perusahaan
                    </button>
                </div>
                @else

                @empty($IsRating)
                @include('components.modal-review')
                @endempty

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
                    <label for="pelamar">
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
                    <input type="radio" name="radioTipe" id="pelamar" class="peer/pelamar hidden" />

                    <div
                        class="absolute h-[10px] w-[65px] rounded-2xl bg-[#22336A] top-[-4px] transform peer-checked/about:translate-x-[0px] peer-checked/jobs:translate-x-[85px] md:peer-checked/jobs:translate-x-[145px] peer-checked/review:translate-x-[180px] md:peer-checked/review:translate-x-[315px] peer-checked/pelamar:translate-x-[485px] transition">
                    </div>
                    <div class="">

                    </div>
                    <!-- ABOUT -->
                    @include('profile.company.partials.about')

                    <!-- ABOUT -->

                    <!-- JOBS -->
                    @include('profile.company.partials.jobs')
                    <!-- JOBS -->

                    <!--review-->
                    @include('profile.company.partials.reviews')
                    <!--review-->

                    <!--list pendaftar-->
                    @include('profile.company.partials.applicants')
                    <!--list pendaftar-->

                    <!-- JARAK BAWAH -->
                    <div class="h-[45px]">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>