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
                ->orWhere('body', 'like', '%' . request('search') . '%')->paginate(5);
        }
        return view('discounts.index', [
            'discounts' => $discounts->paginate(5),
            'categories' => Category::all()
        ]);
    }

    public function onlyDiscounts()
    {
        return view('discounts.normal-discounts', [
            'discounts' => Discount::latest()->paginate(5),
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
