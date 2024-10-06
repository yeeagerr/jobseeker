<div class="flex-[300px] border  max-w-[400px] p-4 rounded-xl  bg-white">
    <div class="flex justify-between items-start mb-2">
        <div>
            <img src="{{$review->user->foto ?? null ? asset('./profile_image/' . $review->user->foto ) : "
                /images/user-icon-default.png"}}" class="w-[75px] object-cover h-[75px] rounded-full" alt="">
            <h2 class="text-2xl border">{{$review->user->name}}</h2>

        </div>

        <div class="flex items-center gap-3 mr-7">
            <img src="{{asset('/images/bintang/bintang' . $review->rating . '.png')}}" class="w-[130px] object-contain"
                alt="">
            <p>({{$review->rating}})</p>
        </div>
    </div>
    @if (Auth::user()->id == $review->user_id)
    <form action="{{route('review.destroy', $review->id)}}" class="mb-2" method="POST">
        @csrf
        @method('DELETE')
        <button class="bg-[#FF0F0F] w-[100px] h-[40px] text-white rounded-3xl cursor-pointer"
            type="submit">Delete</button>
    </form>
    @endif
    <p>
        {{$review->message}}
    </p>
</div>