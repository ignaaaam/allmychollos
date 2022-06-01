<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountLikesController extends Controller
{
    public function store(Discount $discount)
    {
        $discount->like(current_user());

        return back();
    }

    public function destroy(Discount $discount)
    {
        $discount->dislike(current_user());

        return back();
    }
}
