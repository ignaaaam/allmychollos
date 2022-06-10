<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminDiscountController extends Controller
{
    public function index()
    {
        return view('admin.discounts.index', [
            'discounts' => Discount::paginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.discounts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $originalPrice = request('original_price');
        $discountedPrice = request('discounted_price');
        $percentage = 100 * ($originalPrice - $discountedPrice) / $originalPrice;

        $link = parse_url(request()->input('link'), PHP_URL_SCHEME) ? request()->input('link') : 'https://' . request()->input('link');

        Discount::create(array_merge($this->validateDiscount(), [
            'user_id' => request()->user()->id,
            'slug' => Str::slug(strtolower(request('slug'))),
            'thumbnail' => request()->file('thumbnail')->store('discounts_thumbnail'),
            'percentage' => $percentage,
            'premium' => 0,
            'link' => $link
        ]));

        return redirect('/')->with('success', 'Descuento creado con exito!');
    }


    protected function validateDiscount(?Discount $discount = null): array
    {
        $discount ??= new Discount();
        $originalPrice = request('original_price');
        $discountedPrice = request('discounted_price');
        $percentage = 100 * ($originalPrice - $discountedPrice) / $originalPrice;

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $discount->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('discounts', 'slug')->ignore($discount)],
            'body' => 'required',
            'original_price' => 'required|numeric|gt:discounted_price',
            'discounted_price' => 'required|numeric|lt:original_price',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'link' => 'required',
        ]);
    }

    public function edit(Discount $discount)
    {
        $categories = Category::all();
        return view('users.discounts.edit', [
            'discount' => $discount,
            'categories' => $categories
        ]);
    }

    public function update(Discount $discount) {
        $attributes = $this->validateDiscount($discount);

        if($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('discounts_thumbnail');
        }
        $attributes['slug'] = Str::slug(strtolower(request('slug')));
        $discount->update($attributes);

        return back()->with('success', 'Descuento actualizado!');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();

        return back()->with('success','Descuento eliminado!');
    }
}
