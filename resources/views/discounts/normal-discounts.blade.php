<x-layout>
    <main>
        <x-categories-row
            :categories="$categories" />

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
