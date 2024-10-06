<div class="mt-5 hidden peer-checked/jobs:hidden  peer-checked/review:block">
    <p class="text-end mr-5 tracking-wider mt-10">
        Di sortir :
        <span class="font-bold">
            paling membantu
        </span>
    </p>
    <h3 class="text-2xl tracking-wide">
        Showing <span class="font-bold">6</span> Reviews sorted by most recent
    </h3>
    <h1 class="text-3xl font-bold tracking-wider mr-5 mt-10 text-[#133240]">
        BEBERAPA FEEDBACK
    </h1>
    <h4 class="text-l tracking-wider mr-5 mt-5 text-[#133240]">
        Your trust is our main concern so these ratings for
        <span class="font-bold">Google Group</span>
        are shared as-is from employees in line with our community guidelines
    </h4>

    <div class="mt-4 flex gap-3 flex-wrap">
        @foreach ($reviews as $review)
        @include('components.card-review')
        @endforeach
        {{$reviews->links()}}
    </div>

</div>