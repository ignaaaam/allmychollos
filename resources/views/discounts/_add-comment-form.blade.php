@auth
    <x-panel>
        <form method="POST" action="/discounts/{{ $discount->slug }}/comments">
            @csrf

            <header class="flex items-center">
                @if (isset(auth()->user()->avatar))
                <img class="rounded-xl" src="/images/{{ auth()->user()->avatar }}" alt=""
                     width="40" height="40">
                @else
                    <img src="{{ URL::to('/') }}/images/user-default.png" alt="{{ auth()->user()->username }} avatar" width="35" height="35" class="rounded-xl mr-2">
                @endif
                <h2 class="ml-4">Quieres comentar?</h2>
            </header>

            <div class="mt-6">
                                <textarea
                                    name="body"
                                    class="w-full text-sm focus:outline-none focus:ring focus:ring-button-light-orange"
                                    rows="5"
                                    placeholder="Rápido, piensa en algo que decir!"
                                    required></textarea>

                @error('body')
                <span class="text-xs text-red-500"> {{ $message }} </span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 ">
                <x-button>Submit</x-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="border border-gray-200 rounded-md p-6 text-center container mx-auto w-1/2">
        <a class="text-button-light-orange font-bold transition hover:text-button-dark-orange" href="/register">Regístrate</a> o <a class="text-button-light-orange font-bold transition hover:text-button-dark-orange" href="/login">Logueate</a> para comentar!
    </p>
@endauth
