<x-app-layout>
    <input type="checkbox" class="hidden peer" />
    <!-- TIMELINE -->
    <div class="mt-10 max-w-4xl mx-auto relative flex justify-between items-center">
        <!-- LINE -->
        <div class="border-2 border-[#DEE8F8] flex-1" id="seconwave"></div>
        <div class="border-2 border-[#DEE8F8] flex-1"></div>

        <!-- Number -->
        <div class="flex absolute justify-between items-center h-auto w-full px-8 sm:px-0">
            <div
                class="w-[50px] h-[50px] rounded-full bg-[#7384C5] sm:left-0 text-white font-bold grid place-items-center">
                <p>1</p>
            </div>
            <div class="w-[50px] h-[50px] rounded-full bg-[#7384C5] text-white font-bold grid place-items-center">
                <p>2</p>
            </div>
            <div
                class="w-[50px] h-[50px] rounded-full bg-[#7384C5] sm:right-0 text-white font-bold grid place-items-center">
                <p>3</p>
            </div>
        </div>
    </div>

    <div class="mt-10 max-w-[970px] font-bold text-center mx-auto relative flex justify-between items-center">
        <p>Memilih Dokumen</p>
        <p>Jawab Pertanyaan Perusahaan</p>
        <p>Review Dan Kirim</p>
    </div>

    <!-- Edit Pertanyaan Section -->
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-3xl mt-10 p-8">
        <input type="checkbox" id="nextquestion" class="peer hidden" />
        <!-- CHANGE LINE WHEN SECOND QUESTION -->
        <script>
            const nextquestion = document.getElementById("nextquestion");
    nextquestion.addEventListener("change", () => {
      if (nextquestion.checked) {
        document.getElementById("seconwave").style.borderColor = "#22336A";
      } else {
        document.getElementById("seconwave").style.borderColor = "";
      }
    });
        </script>
        <!-- END -->
        <div class="peer-checked:hidden">
            <h2 class="text-2xl font-bold mb-6">Informasi Pribadi</h2>

            <!-- Form -->
            <div>
                <div class="mb-4">
                    <label for="pertanyaan1" class="block text-gray-700 font-semibold mb-2">Nama</label>
                    <input id="pertanyaan1"
                        class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                        value="{{Auth::user()->name}}" disabled />
                </div>
                <div class="mb-4">
                    <label for="pertanyaan2" class="block text-gray-700 font-semibold mb-2">Lokasi Rumah</label>
                    <input id="pertanyaan2"
                        class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                        value="{{Auth::user()->alamat ?? " Kamu tidak ada alamat"}}" disabled />
                </div>
                <div class="mb-4">
                    <label for="pertanyaan3" class="block text-gray-700 font-semibold mb-2">Alamat Email</label>
                    <input id="pertanyaan3"
                        class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                        placeholder="example@gmail.com" disabled value="{{Auth::user()->email ?? " Email kamu tidak
                        tersedia"}}" />
                </div>

                <div class="mb-4">
                    <label for="pertanyaan3" class="block text-gray-700 font-semibold mb-4">Resume</label>

                    <div class="flex items-center gap-2">
                        <label for="resume"
                            class="bg-indigo-600 text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Unggah Resume Kamu
                        </label>
                        <p id="resumeText" class="truncate">
                            Tidak ada resume yang di input
                        </p>
                    </div>
                    <p class="text-gray-700 mt-4">
                        Kamu bisa mengunggak resume berupa foto
                    </p>
                </div>

                <div class="flex justify-end">
                    <label for="nextquestion"
                        class="bg-[#4A3AFF] text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 w-[130px] grid place-items-center cursor-pointer">
                        Lanjut
                    </label>
                </div>
            </div>
        </div>

        <div class="hidden peer-checked:block">
            <h2 class="text-2xl font-bold mb-6">Edit Pertanyaan Interview</h2>
            <p class="text-[#6F6C90] mb-6">
                Jawablah pertanyaan berikut dengan sungguh sungguh
            </p>
            <!-- Form -->
            <form method="POST" action="{{route('applicant.store', $id->id)}}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="resume" class="hidden" id="resume" />
                <!-- CHANGE TEXT BASED FILENAME -->
                <script>
                    const resumeFile = document.getElementById("resume");
        resumeFile.addEventListener("change", (e) => {
          if (!resumeFile.files[0]) {
            document.getElementById("resumeText").innerText =
              "Upload resume kamu!";
          } else {
            document.getElementById("resumeText").innerText =
              resumeFile.files[0].name;
          }
        });
                </script>
                <!-- END -->

                @php
                $count = 1;
                @endphp
                @foreach (json_decode($id->company->has_interview->pertanyaan) as $i)
                <div class="mb-4">
                    <label for="pertanyaan1" class="block text-gray-700 font-semibold mb-2">{{$count++}}. {{$i}}</label>
                    <textarea id="pertanyaan1" rows="5" name="qna[]"
                        class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                        placeholder="Alasan mengapa kamu masuk ke dalam perusahaan kami?"></textarea>
                </div>
                @endforeach

                <div class="flex justify-end gap-2">
                    <label for="nextquestion"
                        class="bg-transparent grid place-items-center cursor-pointer border-2 font-semibold py-3 px-6 rounded-full shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 w-[130px]">
                        Kembali
                    </label>

                    <button
                        class="bg-[#4A3AFF] text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 w-[130px]">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="h-[45px]"></div>
</x-app-layout>