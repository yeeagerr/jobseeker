<div class="w-full h-[100vh] top-0 bg-black bg-opacity-50 flex justify-center items-center fixed z-[10]">
    <div class="bg-white w-[90%] md:w-[600px] rounded-xl flex flex-col items-center">
        <div class="bg-[#f63e32] w-[80px] h-[80px] mt-[-40px] flex justify-center items-center rounded-full">
            <i class="fa-solid fa-x text-3xl text-white"></i>
        </div>
        <p class="text-3xl font-bold tracking-wide mt-3">Maaf</p>
        <p class="mt-6 text-center text-[gray] leading-tight mx-3">
            {{$message}}
        </p>

        <div class="bg-[#F1F5F8] rounded-xl h-[80px] flex justify-center items-center w-full mt-6">
            <button onclick="window.location.href='{{$route ?? ''}}'"
                class="bg-[#4A3AFF] px-7 py-3 text-white rounded-3xl">
                {{$btnMessage}}
            </button>
        </div>
    </div>
</div>