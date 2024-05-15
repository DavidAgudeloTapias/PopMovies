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
        $review->setMovieId($request->input('movie_id'));
        $review->setUserId(auth()->user()->id);
        $review->setComment($request->input('comment'));
        $review->setRating($request->input('rating'));
        $review->save();

        $movie = Movie::find($request->movie_id);
        $movie->rating = Review::where('movie_id', $movie->id)->avg('rating');
        $movie->save();

        return back();
    }
}
