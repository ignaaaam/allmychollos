<x-layout>
    <main>
        @include('components.categories-row')
        @include('discounts._best')
        <section class="w-4/6 mx-auto my-8 font-bold flex flex-col items-center justify-center">
            <h1 class="uppercase text-main-gray text-4xl bold self-start text-center ">Últimos Descuentos</h1>
            @if($discounts->count())
                <x-discounts-grid :discounts="$discounts"/>
            @else
                <p class="my-8 text-center">No hay descuentos disponibles. Por favor vuelva mas tarde. </p>
            @endif
        </section>
    </main>
</x-layout>
