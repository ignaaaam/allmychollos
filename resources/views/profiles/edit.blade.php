<x-layout>
    <x-setting :heading="'Editar Perfil" >
                <form action="/users/{{ $user->username }}/edit }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Nombre')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Username -->
                        <div class="mt-4">
                            <x-label for="username" :value="__('Username')" />

                            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Telefono')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
                        </div class="mt-4">

                        <!-- Pais -->
                        <div class="mt-4">
                            <x-label for="country" :value="__('Pais')" />

                            <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autofocus />
                        </div>

                        <!-- Ciudad -->
                        <div class="mt-4">
                            <x-label for="city" :value="__('Ciudad')" />

                            <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     required autocomplete="new-password"
                            :value="old('password)"/>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                     type="password"
                                     name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-white hover:translate-x-0.5 transition-transform" href="{{ route('login') }}">
                                {{ __('Ya tienes cuenta?') }}
                            </a>

                            <x-button class="ml-4">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
    </x-setting>
</x-layout>

