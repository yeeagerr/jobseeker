<div class="mt-5 hidden peer-checked/jobs:block ">
    <h1 class="text-2xl font-bold tracking-wide">
        Berberapa Pekerjaan
    </h1>
    <h1 class="text-xl font-bold flex justify-end text-[#114FA9] ">
        Seluruh Kategori :
    </h1>

    <div class="mt-5 flex justify-center items-stretch gap-5 flex-wrap">
        <!-- CARD -->
        @foreach ($jobs as $job)
        @include('components.cardJob-2')
        @endforeach

        @empty($jobs)
        <p>This company doesnt have available jobs for now.</p>
        @endempty
        <!-- CARD -->
    </div>
</div>