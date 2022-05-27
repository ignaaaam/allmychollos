<?php

use App\Models\Discount;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('discounts.index', [
        'discounts' => Discount::all()
//            ->where('premium','=',false)
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('discounts/{discount:slug}', function (Discount $discount) {
//    return view('discount', [
//        'discount' => $discount
//    ]);
//});

require __DIR__.'/auth.php';
