<x-app-layout>
    <main class="flex mt-5 justify-center items-center">
        <div class="w-[65rem] p-3 bg-white rounded-2xl">
            <h1 class="font-[700] text-2xl tracking-wider mb-5">
                Edit Profile Description
            </h1>

            <form action="{{route('profile.update')}}" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <label for="nama" class="font-bold ml-3 text-lg">Nama</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" placeholder="<?= $user->name ?>" value="<?= $user->name ?>" id="nama"
                            name="name" class="h-full rounded-2xl w-full outline-none" />

                        <i class="fa-regular fa-user border rounded-full py-1 px-3 text-lg"></i>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="posisi" class="font-bold ml-3 text-lg">Posisi</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" placeholder="Contoh : Front End Developer" value="<?= $user->position ?>"
                            id="posisi" name="positionUser" class="h-full rounded-2xl w-full outline-none" />
                    </div>
                </div>

                <div class="mt-4">
                    <label for="deskripsi" class="font-bold ml-3 text-lg">Deskripsi</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" placeholder="Contoh : Saya merupakan web developer ...."
                            value="<?= $user->description ?>" id="deskripsi" name="descriptionUser"
                            class="h-full rounded-2xl w-full outline-none" />
                    </div>
                </div>

                <div class="mt-4">
                    <label for="skill" class="font-bold ml-3 text-lg">Skill</label>
                    <div class="flex items-center flex-wrap gap-3">
                        <input type="text" placeholder="Contoh : Photoshop" id="skill"
                            class="w-[20rem] shadow border px-3 rounded-[50px] h-[55px] rounded- outline-none" />
                        <span
                            class="h-[45px] hover:bg-white hover:text-black hover:border-2 transition font-bold w-[150px] text-white rounded-[50px] bg-[#4A3AFF] cursor-pointer flex items-center justify-center"
                            id="addSkill">
                            Tambah
                        </span>
                    </div>

                    <p class="font-bold ml-3 text-lg mt-2">Keahlian yang ditambah</p>
                    <div class="flex items-center gap-3" id="skillTambah">
                        @foreach ($user->skills ?? [] as $skill)
                        <div class=" relative h-[45px] w-[150px] flex items-center font-bold border-2 shadow-2xl mt-2 rounded-[50px] bg-[#F4F5F6]"
                            id="skill<?= $skill ?>"><input type="text" readonly="true"
                                class="relative w-[95%] text-center text-black cursor-default outline-none bg-transparent"
                                placeholder="<?= $skill ?>" value="<?= $skill ?>" name="skills[]">
                            <p class="absolute right-5 cursor-pointer cancelbtn" id="<?= $skill ?>">X</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <h1 class="font-[700] mt-5 text-2xl tracking-wider mb-3">
                    Edit Profile Description
                </h1>

                <div class="mb-5">
                    <label for="Umur" class="font-bold ml-3 text-lg">Umur</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" placeholder="Contoh : 26 Tahun" id="Umur" name="age"
                            class="h-full rounded-2xl w-full outline-none" value="<?= $user->age ?>" />
                    </div>
                </div>

                <div class="mb-5">
                    <label for="Email" class="font-bold ml-3 text-lg">Email</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="email" placeholder="Contoh : youremail@gmail.com" id="Email" name="email"
                            value="<?= $user->email ?>" class="h-full rounded-2xl w-full outline-none" />
                    </div>
                </div>

                <div class="mb-5">
                    <label for="alamat" class="font-bold ml-3 text-lg">alamat</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" placeholder="Contoh : Bengkong Baru Blok A no 36" id="alamat" name="alamat"
                            class="h-full rounded-2xl w-full outline-none" value="<?=$user->alamat ?>" />
                    </div>
                </div>

                <div class=" mb-5">
                    <label for="nohp" class="font-bold ml-3 text-lg">Nomor Handphone</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="number" inputmode="numeric" placeholder="Contoh : 08117700068" id="nohp"
                            name="nohp" value="<?= $user->nohp ?>" class="h-full rounded-2xl w-full outline-none" />
                    </div>
                </div>

                <h1 class="font-[700] mt-5 text-2xl tracking-wider mb-3">
                    Experience
                </h1>
                <div class="mb-5">
                    <label for="year" class="font-bold ml-3 text-lg">Tahun</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-[15rem] h-[55px]">
                        <input type="text" inputmode="numeric" placeholder="Contoh : 2006-2007" id="year" name="year"
                            class="h-full rounded-2xl w-full outline-none" />
                    </div>
                </div>

                <div class="mb-5">
                    <label for="position" class="font-bold ml-3 text-lg">Posisi</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" placeholder="Contoh : Kepala Divisi Tblkson" id="position" name="positionEx"
                            class="h-full rounded-2xl w-full outline-none" />
                    </div>
                </div>

                <div class="mb-5">
                    <label for="description" class="font-bold ml-3 text-lg">Deskripsi</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" placeholder="Contoh : Mengkordinasikan bagian stok ...." id="description"
                            name="descriptionEx" class="h-full rounded-2xl w-full outline-none" />
                    </div>
                </div>

                <div class="mb-5 flex justify-end gap-3">
                    <button onclick="window.location.href = '{{route('profile')}}'"
                        class="w-[150px] h-[50px] border-[#4A3AFF] border-2 rounded-2xl font-bold hover:bg-[#4A3AFF] hover:text-white transition"
                        type="button">
                        Tidak Jadi
                    </button>
                    <button type="submit"
                        class="w-[150px] h-[50px] bg-[#4A3AFF] rounded-2xl text-white font-bold hover:bg-white hover:border-[#4A3AFF] hover:border-2 hover:text-black transition">
                        Tambah Profile
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>