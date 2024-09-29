<x-app-layout>
    <main class="flex mt-5 justify-center items-center">
        <div class="w-[65rem] p-3 bg-white rounded-2xl">
            <h1 class="font-[700] text-2xl tracking-wider mb-5">
                Tambah Pekerjaan
            </h1>

            <form action="{{route('company.job_store')}}" method="POST">
                @csrf
                <!-- Tanggal -->
                <div class="mb-4">
                    <label for="date" class="font-bold ml-3 text-lg">Masukkan Tanggal</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input name="tanggal" type="date" min="{{date('Y-m-d')}}" id="date" class="h-full
                        rounded-2xl w-full outline-none" placeholder="Contoh: 10 Feb, 2069" />
                    </div>
                    <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                </div>

                <!-- Job Title -->
                <div class="mb-4">
                    <label for="job-title" class="font-bold ml-3 text-lg">Judul Pekerjaan yang di cari</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" name="pekerjaan" id="job-title"
                            class="h-full rounded-2xl w-full outline-none"
                            placeholder="Contoh: Senior Back End Developer" />
                    </div>
                    <x-input-error :messages="$errors->get('pekerjaan')" class="mt-2" />
                </div>

                <!-- Work Time, Type, and Level -->
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label for="jam-kerja" class="font-bold ml-3 text-lg">Pilih Jam Kerja</label>
                        <div
                            class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                            <select id="jam-kerja" name="jam" class="h-full rounded-2xl w-full outline-none">
                                <option value="full time">Full Time</option>
                                <option>Part Time</option>
                                <option>Half Time</option>

                                <!-- Add options here -->
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('jam')" class="mt-2" />
                    </div>
                    <div>
                        <label for="tipe-pekerjaan" class="font-bold ml-3 text-lg">Pilih Tipe Pekerjaan</label>
                        <div
                            class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                            <select id="tipe-pekerjaan" name="tipe" class="h-full rounded-2xl w-full outline-none">
                                <option value="setiap hari">Setiap hari</option>
                                <!-- Add options here -->
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="tingkatan" class="font-bold ml-3 text-lg">Pilih Tingkatan</label>
                        <div
                            class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                            <select id="tingkatan" name="tingkat" class="h-full rounded-2xl w-full outline-none">
                                <option value="pemula">Pemula</option>
                                <!-- Add options here -->
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('tingkat')" class="mt-2" />
                    </div>
                </div>

                <!-- Gaji -->
                <div class="mb-4">
                    <label for="gaji" class="font-bold ml-3 text-lg">Gaji</label>

                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" id="gaji" name="gaji" class="h-full rounded-2xl w-full outline-none"
                            placeholder="Contoh: Rp. 5 Juta" />
                    </div>
                    <x-input-error :messages="$errors->get('gaji')" class="mt-2" />
                </div>

                <!-- Lokasi -->
                <div class="mb-4">
                    <label for="lokasi" class="font-bold ml-3 text-lg">Lokasi</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" id="lokasi" name="lokasi" class="h-full rounded-2xl w-full outline-none"
                            placeholder="Contoh: Pembensin Vitka Batam" />
                    </div>
                    <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                </div>

                <!-- Job Description -->
                <div class="mb-4">
                    <label for="job-desc" class="font-bold ml-3 text-lg">Job Description</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" id="job-desc" name="deskripsi" class="h-full rounded-2xl w-full outline-none"
                            placeholder="Contoh: Panjang kali lebar" />
                    </div>
                    <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                </div>

                <!-- Job Requirement -->
                <div class="mb-4">
                    <label for="job-requirement" class="font-bold ml-3 text-lg">Job Requirement</label>
                    <div class="shadow border flex px-3 items-center justify-between rounded-[50px] w-full h-[55px]">
                        <input type="text" id="job-requirement" name="requirement"
                            class="h-full rounded-2xl w-full outline-none" placeholder="Contoh: Panjang kali lebar" />
                    </div>
                    <x-input-error :messages="$errors->get('requirement')" class="mt-2" />
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-5 mt-6">
                    <button type="button"
                        onclick="window.location.href = '{{route('company.profile', Auth::guard('company')->user()->id)}}'"
                        class="bg-transparent font-semibold border-2 border-[#4f46e5] py-3 px-6 rounded-full shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Tidak Jadi
                    </button>
                    <button type="submit"
                        class="bg-indigo-600 text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Tambahkan
                    </button>
                </div>
            </form>
        </div>
    </main>s
</x-app-layout>