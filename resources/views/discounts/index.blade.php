<x-layout>
    <main>
        @include('components.categories-row')
        <section class=" w-full text-center h-3/4 bg-light-gray flex flex-col items-center justify-center p-10">
            <h1 class="uppercase text-main-gray text-4xl font-bold">Descuentos Populares</h1>
    @if($discounts->count())
            <div class="swiper">
                <div class="swiper-wrapper flex items-center">
                    @foreach($discounts as $discount)
                        <x-discount-featured-card :discount="$discount" />
                    @endforeach
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        @else
            <p class="my-8 text-center">No hay descuentos disponibles. Por favor vuelva mas tarde. </p>
        @endif
        </section>
        <section class="w-4/6 mx-auto my-8 font-bold flex flex-col items-center justify-center">
            <h1 class="uppercase text-main-gray text-4xl bold self-start text-center mb-8 ">Últimos Descuentos</h1>
            @if($discounts->count())
                @foreach($discounts as $discount)
                    <x-discount-card :discount="$discount" />
                @endforeach
            @else
                <p class="my-8 text-center">No hay descuentos disponibles. Por favor vuelva mas tarde. </p>
            @endif
        </section>
    </main>
</x-layout>
