<input type="checkbox" id="modalShow" class="peer hidden" />
<label for="modalShow"
    class="bg-transparent border-indigo-700 border-2 font-semibold py-3 px-6 rounded-3xl shadow-xl hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 cursor-pointer">
    Kirim Ulasan
</label>
<div
    class="w-full h-[100vh] left-0 peer-checked:flex fixed hidden bg-black bg-opacity-50 justify-center items-center top-0 z-[10]">
    <div class="bg-white p-3 w-[90%] md:w-[600px] rounded-xl flex flex-col items-center">
        <div class="w-full mb-2 mx-3">
            <label for="modalShow" class="cursor-pointer">
                <h1 class="text-2xl">X</h1>
            </label>
        </div>
        <form action="{{route('review.store', $id->id)}}" class="w-full" method="POST">
            @csrf
            <div class="flex gap-3 justify-between">
                <div class="flex-[200px]">
                    <label for="nama"><strong>Name</strong></label>
                    <div class="border rounded-3xl h-[55px] flex justify-between items-center px-4">
                        <p class="truncate">{{Auth::user()->name}}</p>
                        <i class="fa-regular fa-user border rounded-full py-1 px-3 text-lg"></i>
                    </div>
                </div>

                <div></div>

                <div class="flex-[200px]">
                    <label for="email"><strong>Email</strong></label>
                    <div class="border rounded-3xl h-[55px] flex justify-between items-center px-4">
                        <p class="truncate">{{Auth::user()->email}}</p>
                        <i class="fa-regular fa-envelope border rounded-full py-1 px-3 text-lg"></i>
                    </div>
                </div>
            </div>

            <div class="my-3 relative">
                <label for="rating"><strong>Your sevice rating</strong></label>
                <img src="/images/bintang/bintang0.png" class="mt-2" draggable="false" width="180" id="imageStar"
                    alt="" />
                <div
                    class="absolute border h-[35px] w-[180px] bottom-0 flex justify-between gap-3 items-center px-2 opacity-0">
                    <input type="radio" name="rating" id="radiorating" value="1"
                        class="radiorating cursor-pointer h-[30px] w-[30px]" />
                    <input type="radio" name="rating" id="radiorating" value="2"
                        class="radiorating cursor-pointer h-[30px] w-[30px]" />
                    <input type="radio" name="rating" id="radiorating" value="3"
                        class="radiorating cursor-pointer h-[30px] w-[30px]" />
                    <input type="radio" name="rating" id="radiorating" value="4"
                        class="radiorating cursor-pointer h-[30px] w-[30px]" />
                    <input type="radio" name="rating" id="radiorating" value="5"
                        class="radiorating cursor-pointer h-[30px] w-[30px]" />
                </div>
                <x-input-error :messages="$errors->get('rating')" class="mt-2" />
            </div>

            <script>
                let startImage = "/images/bintang/";
        document.querySelectorAll(".radiorating").forEach((e) => {
          e.addEventListener("click", (h) => {
            document.getElementById("imageStar").src =
              startImage + `bintang${h.target.value}.png`;
          });
        });
            </script>

            <textarea name="message" cols="10" rows="10" class="mt-5 border w-full rounded-3xl p-4" required></textarea>
            <x-input-error :messages="$errors->get('')" class="mt-2" />

            <div class="flex items-center gap-2">
                <input type="checkbox" name="agreement" required
                    class="rounded-lg appearance-none checked:bg-[#CEDEF7] border-[#CEDEF7] border-2 h-[25px] w-[25px] checked:bg-[url('https://icons.veryicon.com/png/o/miscellaneous/template-4/checklist-11.png')] bg-no-repeat bg-center bg-cover outline-none"
                    id="" />
                <p>I have read and accept the Privacy Policy.</p>
            </div>

            <div class="mt-4">
                <button class="bg-[#4A3AFF] px-7 py-3 text-white rounded-3xl mr-1" type="submit">
                    Kirim Ulasan
                </button>
                <label for="modalShow" class="bg-[#4A3AFF] px-7 py-3 text-white rounded-3xl cursor-pointer">
                    Close
                </label>
            </div>
        </form>
    </div>
</div>