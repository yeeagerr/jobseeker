<div class="mt-5 hidden peer-checked/about:block ">
    <h1 class="text-2xl font-bold tracking-wide">
        Preview Perusahaan
    </h1>
    <div class="flex mt-3">
        <p class="font-bold text-sm md:text-lg tracking-wider w-[150px] md:w-[250px]">
            Webiste
        </p>
        <p class="text-sm md:text-lg">: {{$id->link}}</p>
    </div>
    <div class="flex">
        <p class="font-bold text-sm md:text-lg tracking-wider w-[150px] md:w-[250px]">
            Industry
        </p>
        <p class="text-sm md:text-lg">: {{$id->industri}}</p>
    </div>
    <div class="flex">
        <p class="font-bold text-sm md:text-lg tracking-wider w-[150px] md:w-[250px]">
            Company Size
        </p>
        <p class="text-sm md:text-lg">: {{$id->size}}</p>
    </div>

    <div class="flex">
        <p class="font-bold text-sm md:text-lg tracking-wider w-[150px] md:w-[250px]">
            Primary Location
        </p>
        <p class="text-sm md:text-lg w-[60%] h-auto">
            : {{$id->lokasi}}
        </p>
    </div>

    <p class="text-lg mt-5">
        {{$id->deskripsi}}
    </p>
</div>