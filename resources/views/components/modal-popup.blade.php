@props([
'color' => "bg-[#4A3AFF]", //Warna default, bisa di ubah sendiri
'part' => '', //untuk membedakan modal, kalau modal lebih dari satu bedakan pakai nomor atau lainya
"firstBtn" => false, // untuk mengetahui apakah butuh tombol untuk menunjukan modal atau secara langsung
'message'=> '', // pesan
"danger" => false, // untuk mengetahui kalau ini modal danger atau tidak
"title" => "", // judul
"icon" => "check", // icon
'link' => false //untuk menuju ke suatu page, ini pengganti close modal, tapi bukan ngeclose modal tapi ke page
])

{{--
Icon terdiri dari : fa-check , fa-x , fa-question
--}}

<!-- TOGGLE MODAL -->
<input type="checkbox" id="modalShow{{$part}}" class="peer hidden" />
@if ($firstBtn)
<label for="modalShow{{$part}}" class="{{$color}} px-7 py-3 text-white rounded-3xl cursor-pointer">
    {{$slot}}
</label>
@endif

<div class="w-full h-[100vh] z-[20] fixed {{$firstBtn ? " hidden peer-checked:flex" : "flex peer-checked:hidden" }}
    bg-black bg-opacity-50 justify-center items-center top-0 r-0 z-[10] right-0 overflow-hidden">
    <div class="bg-white w-[90%] md:w-[600px] rounded-xl flex flex-col items-center">
        <div class="{{$danger ? " bg-[#f63e32]" : "bg-[#4A3AFF] " }} w-[80px] h-[80px] mt-[-40px] flex justify-center
            items-center rounded-full">
            <i class="fa-solid fa-{{$icon}} text-3xl text-white"></i>
        </div>
        <p class="text-3xl font-bold tracking-wide mt-3">{{$title}}</p>
        <p class="mt-6 text-center text-[gray] leading-tight mx-3">
            {{$message}}
        </p>

        <div class="bg-[#F1F5F8] rounded-xl h-[80px] flex gap-3 justify-center items-center w-full mt-6">
            <div>{{$custom ?? ""}}</div>

            @if ($link)
            <button type="button" onclick="window.location.href='{{$link}}'"
                class="bg-[#4A3AFF] px-7 py-3 text-white rounded-3xl cursor-pointer">Kembali</button>
            @else
            <label for="modalShow{{$part}}" class="bg-[#4A3AFF] px-7 py-3 text-white rounded-3xl cursor-pointer">
                Close
            </label>
            @endif
        </div>
    </div>
</div>
<!-- END TOGGLE MODAL -->