<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::latest();

        if(request('search')) {
            $discounts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
        return view('discounts.index', [
            'discounts' => $discounts->get(),
            'categories' => Category::all()
        ]);
    }

    public function onlyDiscounts()
    {
        return view('discounts.normal-discounts', [
            'discounts' => Discount::latest()->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Discount $discount)
    {
        return view('discounts.show', [
            'discount' => $discount,
        ]);
    }
}
