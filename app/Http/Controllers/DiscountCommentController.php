<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountCommentController extends Controller
{
    public function store(Discount $discount)
    {
        //validation
        request()->validate([
            'body' => 'required'
        ]);


        // add a comment to the given post
        $discount->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
