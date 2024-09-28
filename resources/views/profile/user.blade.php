<x-app-layout>
    <x-slot name="title"> Profile - User </x-slot>

    {{-- @include('components.modal-danger') --}}
    @if (!Auth::user())
    <x-modal-danger :message="$message" :btnMessage="$btnMessage" :route="$route" />
    @endif

    <div class="bg-[#f2f7fe] flex justify-center items-start flex-wrap gap-5 p-6">
        <div class="flex flex-col items-center bg-white p-4 rounded-2xl w-[350px]">
            <div class="w-[140px] h-[140px] rounded-full">
                <img src="{{$user->foto ?? null ? asset('./profile_image/' . $user->foto ) : "
                    /images/user-icon-default.png"}}" class="h-full w-full object-cover rounded-full"
                    alt="defaultPhoto" />
            </div>
            <h1 class="text-[#114FA9] text-center font-bold text-[40px] mt-5 leading-[40px]">
                {{$user->name ?? "John Doe"}}
            </h1>
            <p class="text-lg tracking-wide font-[600] text-center">
                {{-- Fullstack Web Developer --}}
                {{$user->position ?? "-"}}
            </p>

            <p class="mt-5 text-center">
                {{$user->description ?? "-"}}
            </p>

            <div class="w-full my-6">
                <p class="font-bold text-xl tracking-wider block">Skills</p>
                <div class="flex gap-2 flex-wrap mt-2">

                    @foreach ($user->skills ?? [] as $skill)
                    <div
                        class="py-1 cursor-default transform hover:bg-[#4567D6] hover:text-white transition px-4 border-[#4567D6] border-2 rounded-2xl">
                        {{$skill}}

                    </div>
                    @endforeach

                </div>
            </div>

            <button onclick="window.location.href ='{{route('profile.edit')}}'"
                class="bg-[#4A3AFF] py-3 w-[90%] rounded-[35px] text-white">
                Edit Profile Kamu
            </button>
        </div>

        <div class="bg-white flex-[500px] p-4 rounded-2xl ">
            <h1 class="text-[#114FA9] block text-3xl font-[700] tracking-wider">
                Personal Information
            </h1>

            <p class="font-bold text-sm md:text-xl mt-3">
                <span class="text-[gray] tracking-wide">Umur</span> : {{$user->age ?? "-"}} Tahun
            </p>
            <p class="font-bold text-sm md:text-xl mt-2">
                <span class="text-[gray] tracking-wide">Email</span> :
                {{$user->email ?? "-"}}
            </p>
            <p class="font-bold text-sm md:text-xl mt-2">
                <span class="text-[gray] tracking-wide">Alamat</span> : {{$user->alamat ?? "-"}}
            </p>
            <p class="font-bold text-sm md:text-xl mt-2">
                <span class="text-[gray] tracking-wide">Nomor Handphone</span> :
                {{$user->nohp ?? "-"}}
            </p>

            <div class="flex justify-between gap-3 items-center mt-7">
                <p class="text-[#114FA9] text-3xl font-bold">Experience</p>
                <div class="bg-[#114FA9] flex-1 h-[3px] rounded-full mb-[-6px]"></div>
            </div>

            <div class="flex mt-4 relative overflow-hidden">
                <div class="absolute left-[118px] top-[35px] h-full bg-[#4567D6] w-[5px] rounded-full"></div>

                <div class="w-full">
                    <div class="flex">
                        <p class="w-[100px]"></p>
                        <div
                            class="w-[40px] h-[40px] flex justify-center items-center text-xl bg-[#F2F7FD] rounded-full">
                            <div><i class="fa-regular fa-building"></i></div>
                        </div>
                    </div>

                    <!-- TIMELINE PER YEAR -->

                    {{-- @foreach ($user->pengalaman as $i)
                    {{dd($i)}}
                    @endforeach --}}
                    @foreach ($user->pengalaman ?? [] as $i)
                    <div class="flex relative items-center z-1 mt-[10px] w-full ">
                        <p class="w-[110.5px]  overflow-hidden text-center text-[gray] font-bold">
                            {{$i[0]}}
                        </p>
                        <div class="w-[20px] h-[20px] flex justify-center items-center text-xl bg-black rounded-full">
                        </div>
                        <div class="md:w-[70%] flex-[100px]  sm:w-[300px] ml-2 ">
                            <h1 class="block font-bold text-2xl"> {{$i[1]}}
                            </h1>
                            <p>
                                {{$i[2]}}
                            </p>
                        </div>
                    </div>
                    @endforeach


                    <!--  -->
                </div>
            </div>
        </div>
    </div>


    <div class="flex justify-end items-center w-full pr-5 mb-5">
        <x-modal-popup color="bg-[#FF0F0F]" firstBtn="true"
            message="Are you sure want delete your account {{$user->name}}?" icon="question" title="Delete Account">
            Delete Account
            <x-slot name="custom">
                <form action="{{route('delete.account', $user->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="bg-[#FF0F0F] px-7 py-3 text-white rounded-3xl cursor-pointer">
                        Yes, Delete Account
                    </button>
                </form>

            </x-slot>
        </x-modal-popup>
    </div>

</x-app-layout>