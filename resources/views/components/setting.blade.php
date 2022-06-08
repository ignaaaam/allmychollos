@props(['heading'])

<section class="py-8 max-w-4xl mx-auto px-8">
    <h1 class="text-lg font-bold mb-8 pb-2 px-4 border-b">
        {{ $heading }}
    </h1>
    <div class="flex-col mb-4">
        @auth
        <aside class="w-48 flex-shrink-0 ml-12 mb-4 lg:ml-0">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/users/{{ auth()->user()->username }}" class="{{ request()->is('profile') ? 'text-button-light-orange' : '' }}">Mi Perfil</a>
                </li>
                <li>
                    <a href="/user/discounts" class="{{ request()->is('user/discounts') ? 'text-button-light-orange' : '' }}">Mis descuentos</a>
                </li>
                <li>
                    <a href="discounts/create" class="{{ request()->is('user/discounts/create') ? 'text-button-light-orange' : '' }}">Añadir descuento</a>
                </li>
            </ul>
        </aside>
        @else
        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
        @endif
    </div>
</section>
