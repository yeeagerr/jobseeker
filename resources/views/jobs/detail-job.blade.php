<x-app-layout>
    <x-header-title :title="$id->company->nama" :logo="asset('/company.logo/' . $id->company->logo)"
        :lokasi="$id->company->lokasi" />


    <main class="flex items-end  justify-center gap-5 mt-[50px]  flex-wrap-reverse px-3 my-10">
        <div class="bg-white flex justify-center rounded-2xl flex-[500px] items-start p-4 ">
            <div class="bg-[#E2ECFE] p-6 rounded-2xl w-full">
                <h2 class="text-2xl font-bold tracking-wide block mb-2">
                    Job Description :
                </h2>
                <p class="text-[gray] font-bold tracking-wide">
                    {{$id->deskripsi}}
                </p>

                <h2 class="text-2xl font-bold tracking-wide block mb-2 mt-8">
                    Job Requirements :
                </h2>
                <p class="text-[gray] font-bold tracking-wide">
                    {{$id->requirement}}
                </p>
            </div>
        </div>

        <div class="w-[350px] mb-5 bg-white p-3 rounded-3xl">
            <div class="bg-[#E2ECFE] rounded-3xl p-3">
                <div class="flex items-center mb-3">
                    <div class="w-[60px] h-[60px]">
                        <img src="{{$id->company->logo ? asset('/company.logo/' . $id->company->logo ) : "
                            /images/user-icon-default.png"}}" class="w-full h-full object-cover rounded-full"
                            alt="comapnyLogo" />
                    </div>
                    <div class="ml-2">
                        <p class="text-lg text-[#114FA9] tracking-wider">{{$id->company->nama}}</p>
                        <p class="font-bold mt-[-5px]">{{$id->pekerjaan}}</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="text-[gray] font-bold text-sm">Nama Perusahaan :</p>
                        <p class="font-bold text-sm w-[150px]">{{$id->company->nama}}</p>
                    </div>

                    <div>
                        <p class="text-[gray] font-bold text-sm">Level Tingkatan :</p>
                        <p class="font-bold text-sm w-[120px]">{{$id->tingkat}}</p>
                    </div>
                </div>

                <div class="flex justify-between mt-5 mb-4">
                    <div>
                        <p class="text-[gray] font-bold text-sm">Total Gaji :</p>
                        <p class="font-bold text-sm w-[150px]">Rp. {{$id->gaji}}</p>
                    </div>

                    <div>
                        <p class="text-[gray] font-bold text-sm">Bisnis Utama :</p>
                        <p class="font-bold text-sm w-[120px]">{{$id->company->industri}}</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mb-3">
                @isset($isApply)
                <button
                    class="hover:bg-[#4567D6] border-2 hover:text-white transition mt-4 border-[#4567D6] px-3 py-1 font-bold tracking-wider rounded-2xl">
                    Kamu sudah melamar disini
                </button>
                @endisset

                @empty($isApply)
                <button onclick="window.location.href = '{{route('interview', $id->id)}}'"
                    class="hover:bg-[#4567D6] border-2 hover:text-white transition mt-4 border-[#4567D6] px-3 py-1 font-bold tracking-wider rounded-2xl">
                    Lamar Di Lowongan Ini
                </button>
                @endempty

            </div>
        </div>
    </main>
</x-app-layout>