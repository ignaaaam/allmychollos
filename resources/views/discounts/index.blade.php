<x-layout>
    <main>
{{--        @include('components.categories-row')--}}
        <x-categories-row
            :categories="$categories" />
        <section class=" w-full text-center h-3/4 bg-light-gray flex flex-col items-center justify-center p-10">
            <h1 class="uppercase text-main-gray text-4xl font-bold">Mejores Descuentos</h1>
        @if($allDiscounts->count())
            <div class="swiper">
                <div class="swiper-wrapper flex items-center">
                    @foreach($allDiscounts->where('percentage','>=','25') as $best_discount)
                        <x-discount-featured-card :best_discount="$best_discount" />
                    @endforeach
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        @else
            <p class="my-8 text-center">No hay descuentos disponibles. Por favor vuelva mas tarde. </p>
        @endif
        </section>
        <section class="w-4/6 mx-auto my-8 flex flex-col items-center justify-center">
            <h1 class="uppercase text-main-gray text-4xl font-bold self-start text-center mb-8 ">Últimos Descuentos</h1>
            @if($discounts->count())
                @foreach($discounts as $discount)
                    <x-discount-card :discount="$discount" />
                @endforeach
            @else
                <p class="my-8 text-center">No hay descuentos disponibles. Por favor vuelva mas tarde. </p>
            @endif
                <div class="links p-8">{{ $discounts->appends(request()->input())->links() }}</div>

        </section>
    </main>
</x-layout>
