<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-3xl mt-10 p-8">
        <h2 class="text-2xl font-bold mb-6">Edit Pertanyaan Interview</h2>
        <p class="text-[#6F6C90] mb-6">
            Ubah pertanyaan berikut dengan sungguh sungguh
        </p>

        <!-- Form -->
        <form action="{{route('interview.update', $company->id)}}" method="POST">
            @csrf
            @method("PUT")
            @php
            $count =1 ;
            @endphp
            @foreach (json_decode($company->has_interview->pertanyaan) as $i)
            <div class="mb-4">
                <label for="pertanyaan1" class="block text-gray-700 font-semibold mb-2">Pertanyaan ke
                    {{$count++}}</label>
                <textarea id="pertanyaan1" rows="5" name="pertanyaan[]"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                    placeholder="Alasan mengapa kamu masuk ke dalam perusahaan kami?">{{$i}}</textarea>
            </div>
            @endforeach


            <button
                class="bg-[#4A3AFF] text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 w-[130px]">
                Ubah
            </button>
        </form>
    </div>
    <div class="h-[45px]"></div>
</x-app-layout>