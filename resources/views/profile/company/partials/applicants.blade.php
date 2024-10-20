<div class="mt-5 hidden peer-checked/pelamar:block">
    <div class="flex mb-7 justify-between items-center">
        <h1 class="text-2xl font-bold tracking-wide">
            Kandidat Pekerja
        </h1>
        <div>
            <button onclick="window.location.href='{{route('interview.edit')}}'"
                class="bg-indigo-600 text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Edit petanyaan interview
            </button>

            <button class="bg-[white] font-bold border-2 px-6 ml-3 p-2 text-[gray]">
                Filter
            </button>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <h1 class="text-xl font-bold tracking-wide text-[gray]">
            Total Candidates
        </h1>
        <div class="bg-[#D7F5E7] px-3 py-2 font-bold rounded-xl">
            {{count($id->has_applicant)}}
        </div>
    </div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Responsive Table with TailwindCSS</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100">
        <div class="container mx-auto p-4">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white" style="border-spacing: 0 50px">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-[#f2f7fd] border-b-[20px]">
                                Candidate Name
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-[#f2f7fd] border-b-[20px]">
                                Profile
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-[#f2f7fd] border-b-[20px]">
                                Applied Date
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-[#f2f7fd] border-b-[20px]">
                                Jenis Pekerjaan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <!-- Row 1 -->
                        @foreach ($id->has_applicant as $i)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap border-[#f2f7fd] border-b-[10px]">
                                {{$i->user->name}}
                            </td>
                            <td onclick="window.location.href='{{route('user.profile', $i->user_id)}}'"
                                class="px-6 py-4 whitespace-nowrap border-[#f2f7fd] border-b-[10px] text-blue-600 cursor-pointer">
                                Lihat Profil
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-[#f2f7fd] border-b-[10px]">
                                {{\Carbon\Carbon::parse($i->created_at)->format('d M Y')}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-[#f2f7fd] border-b-[10px]">
                                {{$i->pekerjaan->pekerjaan}}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>
</div>