<div class="w-[300px] rounded-3xl p-2 mb-5 bg-white">
    <div class="bg-[#E2ECFE] rounded-3xl p-3">
        <div class="flex justify-between items-center">
            <div class="bg-white p-2 rounded-xl tracking-wide font-bold">
                {{$s->age ?? "Unknown"}}
            </div>
            <i class="bg-white p-2 rounded-xl fa-regular fa-bookmark text-black cursor-pointer"></i>
        </div>

        <div class="flex justify-between items-center mt-4 mb-3">
            <div class="w-[160px]">
                <p class="text-lg text-[#114FA9] block ">
                    {{$s->name}}
                </p>
                <p class="font-bold text-xl">{{$s->position ?? "Unknown"}}</p>
            </div>

            <div class="w-[70px] h-[70px]">
                <img src="{{$s->foto ?? null ? asset('/profile_image/' . $s->foto ) : "
                    ./images/user-icon-default.png"}}" class="w-full h-full object-cover rounded-full"
                    alt="comapnyProfile" draggable="false">
            </div>
        </div>

        <div class="flex gap-2 flex-wrap">

            @isset($s->skills)
            @foreach ($s->skills ?? "" as $i)
            <div class="border-[#4567D6] border-2  text-center py-1 px-2 rounded-2xl">{{$i}}</div>
            @endforeach
            @endisset

        </div>
    </div>

    <div class="flex justify-between items-center mt-4 mb-1">
        <div>
            {{-- <p class=" font-bold text-md">Rp {{$s->gaji ?? ""}}</p> --}}
            <p class="text-[gray] text-sm w-[165px] truncate">{{$s->alamat ?? "Alamat Unknown"}}</p>
        </div>

        <button
            class="hover:bg-[#4567D6] border-2 hover:text-white transition  border-[#4567D6] px-3 py-1 font-bold tracking-wider rounded-xl">
            Detail
        </button>
    </div>
</div>