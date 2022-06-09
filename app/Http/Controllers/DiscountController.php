<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DiscountController extends Controller
{
    public function index()
    {
//        N+1 PROBLEM SOLVED USING ->WITH, PASSED FROM 25 QUERIES to 9-12 FOR DB OPITMIZATION

        $discounts = Discount::latest()->with(['category','comments']);
        $allDiscounts = Discount::with(['category','comments'])->get();

        if(request('search')) {
            $discounts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')->paginate(5);
        }
        return view('discounts.index', [
            'discounts' => $discounts->paginate(5),
            'allDiscounts' => $allDiscounts,
            'categories' => Category::all()
        ]);
    }

    public function onlyDiscounts()
    {
        return view('discounts.normal-discounts', [
            'discounts' => Discount::with('comments')->latest()->paginate(5),
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
