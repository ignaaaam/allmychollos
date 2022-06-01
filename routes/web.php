<?php

use App\Http\Controllers\DiscountCommentController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DiscountLikesController;
use App\Http\Controllers\ProfilesController;
use App\Models\Category;
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

Route::get('/', [DiscountController::class, 'index'])->name('home');
Route::get('discounts', [DiscountController::class, 'onlyDiscounts'])->name('normal-discounts');

Route::get('discounts/{discount:slug}', [DiscountController::class, 'show']);



Route::get('/users/{user:username}', [ProfilesController::class, 'show'])
    ->name('profile');

Route::get('categories/{category:slug}', function (Category $category) {
    return view('discounts.normal-discounts', [
        'discounts' => $category->discounts,
        'categories' => Category::all()
    ]);
});

Route::middleware('auth')->group(function () {

    Route::post('discounts/{discount:slug}/comments', [DiscountCommentController::class, 'store']);

    Route::post('/discounts/{discount}/like', [DiscountLikesController::class, 'store']);
    Route::delete('/discounts/{discount}/like', [DiscountLikesController::class, 'destroy']);

});


require __DIR__.'/auth.php';
