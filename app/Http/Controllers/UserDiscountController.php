<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserDiscountController extends Controller
{
    public function index()
    {
        $discounts = auth()->user()->discounts()->orderBy('created_at','desc')->paginate(5);

        return view('users.discounts.index', [
            'discounts' => $discounts
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('users.discounts.create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {
        Discount::create(array_merge($this->validateDiscount(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('discount_thumbnails')
        ]));

        return redirect('/');
    }


    protected function validateDiscount(?Discount $discount = null): array
    {
        $discount ??= new Discount();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $discount->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('discounts', 'slug')->ignore($discount)],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'link' => 'required',
            'published_at' => 'required',
        ]);

    }
}
