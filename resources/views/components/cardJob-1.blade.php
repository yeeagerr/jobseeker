@foreach ($jobs as $job)

<div class="w-[300px] rounded-3xl p-2 mb-5 bg-white">
    <div class="bg-[#E2ECFE] rounded-3xl p-3 h-[80%] flex flex-col justify-between">
        <div>
            <div class="flex justify-between items-center">
                @php
                $formattedDate = \Carbon\Carbon::parse($job->tanggal)->translatedFormat('d M Y');
                @endphp
                <div class="bg-white p-2 rounded-xl tracking-wide font-bold">
                    {{$formattedDate}}
                </div>
                <i class="bg-white p-2 rounded-xl fa-regular fa-bookmark text-black cursor-pointer"></i>
            </div>

            @if (Auth::guard('company')->check())
            @if (Auth::guard('company')->user()->id == $job->company->id)
            <div class="flex mt-2 justify-end gap-1">
                <form action="{{route('job.destroy', $job->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-[#FF0F0F] text-white border border-gray-300  py-1 px-3 rounded-2xl">
                        Delete
                    </button>
                </form>

                <button onclick="window.location.href='{{route('job.edit', $job->id)}}'"
                    class="bg-[#24D600] text-white border border-gray-300 py-1 px-3 rounded-2xl">
                    Edit
                </button>
            </div>
            @endif
            @endif

            <div class="flex justify-between items-center mt-2 mb-3">
                <div class="w-[160px]">
                    <p class="text-lg text-[#114FA9] block ">
                        {{$job->company->nama}}
                    </p>
                    <p class="font-bold text-xl">{{$job->pekerjaan}}</p>
                </div>

                <div class="w-[70px] h-[70px]">
                    <img src="{{$job->company->logo ?? null ? asset('./company.logo/' . $job->company->logo ) : "
                        ./images/user-icon-default.png"}}" class="w-full h-full object-cover rounded-full"
                        alt="comapnyProfile">
                </div>
            </div>
        </div>

        <div class="flex gap-2 flex-wrap">

            @if ($job->jam ?? "")
            <div class="border-[#4567D6] border-2  text-center py-1 px-2 rounded-2xl">{{$job->jam}}</div>
            @endif

            @if ($job->tingkat ?? "")
            <div class="border-[#4567D6] border-2  text-center py-1 px-2 rounded-2xl">{{$job->tingkat}}
            </div>
            @endif

            @if ($job->tipe ?? "")
            <div class="border-[#4567D6] border-2  text-center py-1 px-2 rounded-2xl">{{$job->tipe}}
            </div>
            @endif

        </div>
    </div>

    <div class="flex justify-between items-center mt-4 mb-1">
        <div>
            <p class=" font-bold text-md">Rp {{$job->gaji ?? ""}}</p>
            <p class="text-[gray] text-sm w-[165px] truncate">{{$job->lokasi ?? ""}}</p>
        </div>

        <button onclick="window.location.href='{{route('detail.job', $job->id)}}'"
            class="hover:bg-[#4567D6] border-2 hover:text-white transition  border-[#4567D6] px-3 py-1 font-bold tracking-wider rounded-xl">
            Detail
        </button>
    </div>
</div>
@endforeach