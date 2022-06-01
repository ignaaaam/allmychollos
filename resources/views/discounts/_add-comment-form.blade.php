@auth
    <x-panel>
        <form method="POST" action="/discounts/{{ $discount->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img class="rounded-xl" src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt=""
                     width="40" height="40">
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                                <textarea
                                    name="body"
                                    class="w-full text-sm focus:outline-none focus:ring"
                                    rows="5"
                                    placeholder="Quick, think of something to say!"
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
