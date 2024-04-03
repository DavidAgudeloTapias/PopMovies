<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    public function store(Request $request) : RedirectResponse
    {
        $review = new Review();
        $review->movie_id = $request->movie_id;
        $review->user_id = auth()->user()->id;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->save();

        $movie = Movie::find($request->movie_id);
        $movie->rating = Review::where('movie_id', $movie->id)->avg('rating');
        $movie->save();

        return back();
    }
}
