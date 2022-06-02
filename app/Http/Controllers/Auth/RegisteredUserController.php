<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|numeric|digits:9|unique:users,phone',
            'country' => 'required|max:255|string',
            'city' => 'required|max:255|string',
            'password' => 'required|min:7|max:20'
        ]);
        $attributes['role_id'] = 2;
//        $user = User::create([
//            'name' => $request->name,
//            'username' => $request->username,
//            'email' => $request->email,
//            'phone' => $request->phone,
//            'country' => $request->country,
//            'city' => $request->city,
//            'password' => Hash::make($request->password),
//            'role_id' => 2
//        ]);

//        event(new Registered($user));

        Auth::login(User::create($attributes));

        return redirect(RouteServiceProvider::HOME)->with('success', 'Tu cuenta ha sido creada');
    }
}
