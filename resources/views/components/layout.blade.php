<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body {{-- style="font-family: Montserrat, sans-serif" --}} class="antialiased">
            <nav class="h-full md:flex md:justify-between md:items-center bg-main-gray h-24">
                <div class="ml-8">
                    <a href="/">
                        <img src="/images/logo-small.png" alt="Allmychollos Logo" width="125" height="30">
                    </a>
                </div>
                <div>
                    <ul class="flex uppercase text-white text-md">
                        <li class="mx-6">
                            <a href="/">Home</a>
                        </li>
                        <li class="mx-8">
                            <a href="/discounts">Descuentos</a>
                        </li>
                        <li class="mx-8">
                            <a href="/faq">FAQ</a>
                        </li>
                        <li class="mx-8">
                            <a href="/contact">Contacto</a>
                        </li>
                    </ul>
                </div>
                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center bg-light-gray rounded-xl w-4/12 px-3 py-1 mx-8 min-w-fit">
                    <form method="GET" action="/" class="w-full">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="text"
                               name="search"
                               placeholder="Buscar..."
                               class="bg-transparent w-full border-none placeholder-black font-semibold text-sm"
                               value="{{ request('search') }}">
                    </form>
                </div>
                <div class="mt-8 md:mt-0 flex items-center">

                    @auth
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="text-sm font-bold uppercase">Welcome, <span class="text-sm font-bold uppercase text-blue-500 mr-8 ml-1">{{ auth()->user()->username }}<i class="uil uil-angle-down ml-2"></i></span></button>
                            </x-slot>

                            <form id="logout-form" action="/logout" method="POST" class="hidden">
                                @csrf
                            </form>
                        </x-dropdown>
                    @else
                        <button class=" px-4 py-2 rounded-xl bg-gradient-to-b from-button-light-red to-button-dark-red drop-shadow-xl transition-transform hover:-translate-y-0.5">
                            <a href="/login" class="text-lg font-bold uppercase text-white">Login</a>
                        </button>
                        <button class="mx-6 px-2 py-2 rounded-xl bg-gradient-to-b from-button-light-red to-button-dark-red drop-shadow-xl transition-transform hover:-translate-y-0.5">
                            <a href="/register" class="mx-6 text-lg text-white font-bold uppercase">Registro</a>
                        </button>
                    @endauth
                </div>
            </nav>

            <!-- Page Content -->

                {{ $slot }}
            <footer class="bg-main-gray text-center py-16 px-10 mt-16">

            </footer>
    </body>
</html>
