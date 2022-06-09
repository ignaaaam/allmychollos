<x-layout>
    <x-setting :heading="'Editar Perfil'" >
    <form action="/users/{{ $user->username }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <!-- Name -->
                    <x-form.input name="name" :value="old('name', $user->name)" />

                        <!-- Username -->
                    <x-form.input name="username" :value="old('username', $user->username)" />

                        <!-- Email Address -->
                    <x-form.input name="email" :value="old('email', $user->email)" />

                        <!-- Phone -->
                    <x-form.input name="phone" :value="old('phone', $user->phone)" />

                        <!-- Pais -->
                    <x-form.input name="country" :value="old('country', $user->country)" />

                        <!-- Ciudad -->
                    <x-form.input name="city" :value="old('city', $user->city)" />

                        <!-- Password -->

                            <x-form.input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                      autocomplete="new-password"
                            />

                        <!-- Confirm Password -->
                            <x-form.input id="password_confirmation" class="block mt-1 w-full"
                                     type="password"
                                     name="password_confirmation"  />

                    <x-form.button>Actualizar</x-form.button>
                </form>
    </x-setting>
</x-layout>

