<?php

namespace App\Modules\Reviews\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Models\Review;

class ReviewsController extends Controller
{
    public function index()
    {
        // $reviews = Review::paginate();

        return view('reviews::index');
        // return view('reviews::index', [
        //     'reviews' => $reviews,
        // ]);
    }
}
