@props(['logo' => '/images/user-icon-default.png', 'title' => 'Unknown', 'lokasi' => 'Location Unknown'])

<header class="bg-[#E2ECFE] py-5 flex justify-center items-center">
    <div class="w-[85%] h-full flex items-center">
        <div class="w-[90px] h-[90px] mr-5 ">
            <img src="{{$logo}}" class="w-full h-full object-cover rounded-full" alt="logoAll" />
        </div>
        <div>
            <h1 class="text-2xl tracking-wider text-[#114FA9]">
                {{$title}}
            </h1>
            <div class="mt-1 text-[gray] opacity-[70%] flex items-center gap-1">
                <i class="fa-solid fa-bullseye"></i>
                <p class="tracking-wider">{{$lokasi}}</p>
            </div>
        </div>
    </div>
</header>