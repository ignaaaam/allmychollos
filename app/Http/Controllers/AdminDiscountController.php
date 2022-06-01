<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class AdminDiscountController extends Controller
{
    public function index()
    {
        return view('admin.discounts.index', [
            'discounts' => Discount::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.discounts.create');
    }
}
