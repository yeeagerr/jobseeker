<x-app-layout>
    <x-slot name="title">
        {{-- {{dd(Auth::guard('company')->check())}} --}}
        Register Perusahaan </x-slot>
    <main class="flex justify-center mt-5">
        <form class="w-[65rem] rounded-2xl bg-white p-3" action="{{route('company.create')}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <h1 class="font-bold text-2xl tracking-wide">Register Perusahaan</h1>
            <div class="mt-3 flex justify-between px-3 gap-3 flex-wrap">
                <div>
                    <p class="font-bold mb-2">Foto Banner</p>
                    <div class="flex items-center gap-2">
                        <div class="bg-[#4A3AFF] w-[160px] h-[45px] rounded-[25px] shadow-lg">
                            <label for="filebanner"
                                class="text-white flex justify-center items-center w-full h-full">Upload Foto</label>
                            <input accept=".jpg,.png,.jpeg,.webp,.gif" type="file" name="banner" id="filebanner"
                                class="hidden" />
                        </div>
                        <p id="bannerText" class="w-[120px] cursor-pointer truncate">
                            No file choosen
                        </p>
                    </div>
                    <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                </div>

                <div>
                    <p class="font-bold mb-2">Logo Perusahaan</p>
                    <div class="flex items-center gap-2">
                        <div class="bg-[#4A3AFF] w-[160px] h-[45px] rounded-[25px] shadow-lg">
                            <label for="filelogo"
                                class="text-white flex justify-center items-center w-full h-full">Upload Foto</label>
                            <input accept=".jpg,.png,.jpeg,.webp,.gif" type="file" name="logo" id="filelogo"
                                class="hidden" />
                        </div>
                        <p id="logoText" class="w-[120px] cursor-pointer truncate">
                            No file choosen
                        </p>
                    </div>
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                </div>
            </div>

            <h1 class="font-bold text-2xl mt-5 mb-2">Preview Perusahaan</h1>
            <div class="mb-5">
                <label for="perusahaan" class="font-bold ml-3 text-lg">Nama Perusahaan</label>
                <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                    <input type="text" id="perusahaan" name="nama" class="h-full rounded-2xl w-full outline-none" />
                </div>
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="Lokasi" class="font-bold ml-3 text-lg">Lokasi</label>
                <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                    <input type="text" id="Lokasi" name="lokasi" class="h-full rounded-2xl w-full outline-none" />
                </div>
                <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="Website" class="font-bold ml-3 text-lg">Website</label>
                <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                    <input type="text" id="Website" name="link" placeholder="Contoh : www.websitekamu.com (opsional)"
                        class="h-full rounded-2xl w-full outline-none" />
                </div>
                <x-input-error :messages="$errors->get('link')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="Industri" class="font-bold ml-3 text-lg">Industri</label>
                <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                    <input type="text" id="Industri" name="industri" placeholder="Contoh : Bergerak dibidang IT"
                        class="h-full rounded-2xl w-full outline-none" />
                </div>
                <x-input-error :messages="$errors->get('industri')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="companySize" class="font-bold ml-3 text-lg">Company Size</label>
                <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                    <input type="text" id="companySize" name="size"
                        placeholder="Contoh : sekitar 2000 - 3000 orang / karyawan dll.."
                        class="h-full rounded-2xl w-full outline-none" />
                </div>
                <x-input-error :messages="$errors->get('size')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="desc" class="font-bold ml-3 text-lg">Deskripsi</label>
                <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                    <input type="text" id="desc" name="deskripsi" class="h-full rounded-2xl w-full outline-none" />
                </div>
                <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="email" class="font-bold ml-3 text-lg">Email</label>
                <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                    <input type="email" id="email" name="email" class="h-full rounded-2xl w-full outline-none" />
                </div>
            </div>

            <div class="mb-5">
                <label for="pass" class="font-bold ml-3 text-lg">Password</label>
                <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                    <input type="password" id="pass" name="password" class="h-full rounded-2xl w-full outline-none" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            <div class="mb-5 flex justify-end gap-3">
                <button
                    class="w-[150px] h-[50px] border-[#4A3AFF] border-2 rounded-2xl font-bold hover:bg-[#4A3AFF] hover:text-white transition"
                    type="button">
                    Tidak Jadi
                </button>
                <button type="submit"
                    class="w-[150px] h-[50px] bg-[#4A3AFF] rounded-2xl text-white font-bold hover:bg-white hover:border-[#4A3AFF] hover:border-2 hover:text-black transition">
                    Submit
                </button>
            </div>
        </form>
    </main>

    <script>
        document.getElementById("filebanner").addEventListener("change", (e) => {
        document.getElementById("bannerText").innerHTML =
          e.target.files[0]["name"];
      });
  
      document.getElementById("filelogo").addEventListener("change", (e) => {
        document.getElementById("logoText").innerHTML = e.target.files[0]["name"];
      });
    </script>
</x-app-layout>