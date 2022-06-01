<x-layout>
    <a href="/"
       class="flex items-center font-bold transition-colors duration-300 relative inline-flex self-start text-lg hover:text-button-light-orange mt-4 ml-4">
        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
            <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path class="fill-current"
                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                </path>
            </g>
        </svg>

        Volver a descuentos
    </a>
    <section
        class="w-[20rem] container mx-auto flex-col items-center justify-center my-6 h-auto bg-gradient-to-b from-card-light-gray to-card-main-gray p-6 rounded-2xl drop-shadow-xl md:w-[35rem] lg:w-[50rem] lg:h-auto mb-4 text-center">



        <div class="h-auto flex items-center justify-center">
            @if (isset($user->avatar))
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->username }} avatar" width="35" height="35" class="rounded-xl mr-2 self-center">
            @else
                <img
                    class=" rounded-full mr-2"
                    src="/images/user-default.png"
                    alt=""
                    width="100">
            @endif
        </div>
            <div class="flex justify-center items-center mb-6 mt-6">
                <div>
                    <h2 style="max-width: 270px;" class="font-bold text-2xl mb-1 text-white">{{ $user->name }}</h2>
                    <p class="text-sm text-white">
                        Joined {{ $user->created_at->diffForHumans() }}</p>
                </div>

                <div class="flex">
                    @can('edit', $user)
                        <a href="{{ $user->path('edit') }}"
                           class="rounded-full border border-gray-300 py-2 px-4 text-black text-sm mr-2">
                            Edit Profile
                        </a>
                    @endcan

                </div>
            </div>

    </section>
</x-layout>
