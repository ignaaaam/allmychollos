@props(['discount'])

<div
    class="w-[20rem]  bg-gradient-to-b from-card-light-gray to-card-main-gray p-6 rounded-2xl drop-shadow-xl md:w-[35rem] lg:w-[50rem] lg:h-20 mb-4 swiper-slide my-4">
    <div class="flex-col items-center text-center justify-center h-full lg:grid lg:grid-cols-4 lg:grid-rows-4">
        <a href="" class="flex justify-center lg:row-span-4 lg:-ml-10">
            <img class="h-full " src="/images/pngwing.com.png" alt="" width="120" height="120">
        </a>
        <div
            class="flex-col justify-center items-center text-center w-full  lg:col-start-2 lg:col-span-full lg:row-start-1 lg:row-span-full lg:-ml-14">
            <a href="/discounts/1" class="lg:grid lg:row-start-2">
                <h2 class="text-white font-bold text-lg md:text-2xl lg:my-2 lg:px-4">{{ $discount->title }}</h2>
                <div class="flex my-4 items-center text-center justify-center lg:my-2">
                    <p class="text-price-color font-bold mr-8 text-xl md:text-2xl">{{ $discount->discounted_price }} €</p>
                    <p class="line-through text-white text-lg md:text-lg">{{ $discount->original_price }} €</p>
                </div>
                <p class="text-white my-8 text-sm md:text-lg lg:my-4">{{ $discount->body }}</p>
            </a>
            <div
                class="flex-col items-center justify-center gap-2 lg:flex-row lg:inline-flex lg:col-start-2 lg:col-span-full lg:row-start-4 lg:row-end-5">
                <a class="flex items-center justify-center my-2 " href="/user/1">
                    @if (isset($discount->author->avatar))
                        <img src="{{ asset('storage/' . $discount->author->avatar) }}" alt="{{ $discount->author->username }} avatar" width="35" height="35" class="rounded-xl mr-2">
                    @else
                        <img src="{{ URL::to('/') }}/images/user-default.png" alt="{{ $discount->author->username }} avatar" width="35" height="35" class="rounded-xl mr-2">
                    @endif

                    <p class="mr-4 text-white text-sm font-bold transition-transform hover:translate-x-0.5 md:text-lg">
                        {{ $discount->author->username }}</p>
                </a>
                <div class="flex items-center justify-center my-4 gap-4 mx-4">
                    <div
                        class="border border-light-gray p-1 rounded-md transition-transform hover:-translate-y-0.5 cursor-pointer">
                        <img class="h-full" src="/images/heart.png" alt="" width="30" height="30">
                    </div>
                    <div
                        class="border border-light-gray p-1 rounded-md transition-transform hover:-translate-y-0.5 cursor-pointer">
                        <img class="h-full" src="/images/dislike.png" alt="" width="30" height="30">
                    </div>
                    <div
                        class="flex items-center justify-center border border-light-gray p-1 rounded-md transition-transform hover:-translate-y-0.5 cursor-pointer lg:px-4 comment-container-featured">
                        <img class="h-full" src="/images/comment.png" alt="" width="24" height="24">
                        <p class="text-light-gray ml-2">{{ $discount->comments->count() }}</p>
                    </div>
                </div>
                <div class="flex justify-center lg:w-[250px] lg:-mr-14">
                    <a href="">
                        <button
                            class="flex my-4 items-center justify-center bg-gradient-to-b from-button-light-orange to-button-dark-orange p-2 rounded-md transition-transform hover:-translate-y-0.5 md:p-4 lg:w-full ">

                            <p class="text-light-gray mr-4 font-bold text-sm md:text-lg ">Ver Chollo</p>
                            <img src="/images/external-link.png" alt="" width="20" height="20">
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div
        class="w-auto absolute top-5 left-5 flex-col items-center justify-center rounded-2xl bg-button-light-orange p-2 drop-shadow-lg md:flex-row md:inline-flex">
        <p class="text-white text-xs uppercase font-bold mr-2 md:text-sm ">{{ $discount->percentage }}%</p>
        <p class="text-white text-xs uppercase font-bold md:text-sm ">descuento</p>
    </div>
</div>
