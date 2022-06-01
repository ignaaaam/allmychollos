<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        return view('discounts.index', [
            'discounts' => Discount::all(),
            'categories' => Category::all()
        ]);
    }

    public function onlyDiscounts()
    {
        return view('discounts.normal-discounts', [
            'discounts' => Discount::all(),
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
