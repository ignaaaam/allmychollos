<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'min:3',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
            'name'     => ['string', 'required', 'max:255'],
            'avatar' => $user->exists ? ['image'] : ['required', 'image'],
            'email'    => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users','email')->ignore($user),
            ],
            'phone' => 'required','numeric','digits:9',Rule::unique('users','phone')->ignore($user),
            'country' => 'required','max:255','string',
            'city' => 'required','max:255','string',
            'password' => [
                'string',
                'required',
                'min:7',
                'max:20',
                'confirmed',
            ],
        ]);


        //$attributes['password'] = Hash::make(request('password'));

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }


        $user->update($attributes);

        return redirect($user->path());
    }
}
