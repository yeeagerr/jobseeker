<nav class="sticky top-0 z-[2] flex items-center px-5 justify-between h-[90px] rounded-bl-2xl rounded-br-2xl bg-white">
    <h1 class="text-2xl font-bold tracking-wider">JOB SEEKER</h1>

    <div class="items-center gap-7 hidden lg:flex">
        <a href="{{route('home')}}" class="font-[500] tracking-wider whitespace-nowrap {{request()->is('/') ? "
            border-b-2" : "" }} border-[#2D9CDB]">Home</a>
        <a href="{{route('company')}}"
            class="font-[500] hover:border-b border-[rgb(45,156,219)] tracking-wider whitespace-nowrap {{request()->is('company') ? "
            border-b-2" : "" }}">Company
            Profile</a>
        <a href="{{route('job')}}"
            class="font-[500] hover:border-b border-[#2D9CDB] tracking-wider whitespace-nowrap {{request()->is('job') ? "
            border-b-2" : "" }}">Search Job</a>
        <a href="{{route('profile')}}"
            class="font-[500] hover:border-b border-[#2D9CDB] tracking-wider whitespace-nowrap">My Profile</a>
    </div>

    <div class="items-center hidden lg:flex">

        @auth
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit"> <i
                    class="fa-solid fa-right-from-bracket text-xl px-2 cursor-pointer border-r border-black text-black"></i>
            </button>
        </form>
        @endauth
        @guest
        <i class="fa-solid fa-message text-xl text-black px-2 cursor-pointer border-r border-black"></i>
        @endguest
        <i class="fa-solid fa-bell text-xl text-black px-2 cursor-pointer border-r border-black"></i>


        @auth
        <div class="flex items-center ml-4 cursor-pointer pr-2 border-r border-black"
            onclick="window.location.href='{{route('profile')}}'">
            <div class="w-[35px] h-[35px] rounded-[100%] overflow-hidden">
                <img src="./images/chuuni cover.jpg" class="w-full h-full object-cover" alt="profile" />
            </div>
            <p class="font-[600] ml-2 w-[150px] truncate">
                {{Auth::user()->name}}
            </p>
        </div>
        @endauth

        <button class="bg-[#2D9CDB] text-white ml-4 px-4 py-2 rounded-2xl tracking-wider hover:bg-black transition">
            Sebagai Perusahaan
        </button>

        @guest
        <button onclick="window.location.href='{{route('login')}}'"
            class="bg-[#4A3AFF] text-white ml-4 px-4 py-2 rounded-2xl tracking-wider hover:bg-black transition">
            Login
        </button>
        @endguest
    </div>

    <!-- RESPONSIVE -->
    <label for="menuToggle" class="w-[50px] h-[50px] flex flex-col justify-evenly items-start lg:hidden">
        <input type="checkbox" id="menuToggle" class="peer hidden" />
        <div
            class="bg-black h-[3px] rounded-xl w-full transition transform peer-checked:translate-y-[6px] peer-checked:rotate-[50deg]">
        </div>
        <div class="bg-black h-[3px] rounded-xl w-[80%] peer-checked:hidden transition"></div>
        <div
            class="bg-black h-[3px] rounded-xl w-[50%] peer-checked:w-full transition transfrom peer-checked:translate-y-[-12px] peer-checked:rotate-[-50deg]">
        </div>

        <!-- DROP DOWN -->
        <div
            class="absolute left-0 h-0 overflow-hidden top-[90px] flex peer-checked:py-5 peer-checked:h-[200px] transition-all gap-3 justify-center bg-white peer-checked:border-t-2 items-center flex-col w-full z-10">
            <a href="{{route('home')}}"
                class="text-xl font-[600] tracking-wide pb-1 border-[#2D9CDB] border-b-2">Home</a>
            <a href="{{route('company')}}" class="text-xl font-[600] tracking-wide pb-1">Company Profile</a>
            <a href="{{route('job')}}" class="text-xl font-[600] tracking-wide pb-1">Search Job</a>
            @auth
            <a href="{{route('profile')}}" class="text-xl font-[600] tracking-wide pb-1">My Profile</a>
            @endauth
            @guest
            <a href="{{route('login')}}" class="text-xl font-[600] tracking-wide pb-1">Login</a>
            @endguest
        </div>
    </label>
    <!-- RESPONSIVE -->
</nav>