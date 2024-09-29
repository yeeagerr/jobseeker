<div class="w-[300px] rounded-3xl p-2 mb-5 bg-white">
    <div class="bg-[#E2ECFE] rounded-3xl p-3">
        <div class="flex justify-between items-center">
            <div class="bg-white p-2 rounded-xl tracking-wide font-bold">
                {{$company->has_jobs->count()}} Jobs
            </div>
            <i class="bg-white p-2 rounded-xl fa-regular fa-bookmark text-black cursor-pointer"></i>
        </div>

        <div class="flex justify-between items-center mt-4 mb-3">
            <div class="w-[160px]">
                <p class="text-lg text-[#114FA9] block tracking-wider">
                    {{$company->lokasi}}
                </p>
                <p class="font-bold text-xl">
                    {{$company->nama}}
                </p>
            </div>

            <div class="w-[70px] h-[70px]">
                <img src="{{$company->logo ?? null ? asset('./company.logo/' . $company->logo ) : "
                    ./images/user-icon-default.png"}}" class="w-full h-full object-cover rounded-full"
                    alt="comapnyProfile" />
            </div>
        </div>

        <img src="./images/bintang/bintang4.png" alt="bintangrating" width="100" class="block" />
        <p class="mt-2">4.0 total rating from 213 reviews</p>
    </div>

    <div class="flex justify-end items-center mt-4">

        <button onclick="window.location.href='{{route('company.profile', $company->id)}}'"
            class="hover:bg-[#4567D6] border-2 hover:text-white transition border-[#4567D6] px-3 py-1 font-bold tracking-wider rounded-xl">
            See More
        </button>
    </div>
</div>