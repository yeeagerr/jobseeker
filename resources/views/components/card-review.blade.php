<div class="flex-[300px] border  max-w-[400px] p-4 rounded-xl  bg-white">
    <div class="flex justify-between items-start mb-3">
        <div>
            <img src="{{$review->user->foto ?? null ? asset('./profile_image/' . $review->user->foto ) : "
                /images/user-icon-default.png"}}" class="w-[75px] object-cover h-[75px] rounded-full" alt="">
            <h2 class="text-2xl">{{$review->user->name}}</h2>
        </div>
        <div class="flex items-center gap-3 mr-7">
            <img src="{{asset('/images/bintang/bintang' . $review->rating . '.png')}}" class="w-[130px] object-contain"
                alt="">
            <p>({{$review->rating}})</p>
        </div>
    </div>
    <p>
        {{$review->message}}
    </p>
</div>