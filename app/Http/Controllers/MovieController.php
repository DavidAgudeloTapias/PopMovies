<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\View\View;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request) : View
    {
        $viewData = [];
        $viewData["title"] = "Movies - PopMovies";
        $viewData["subtitle"] = "Available movies";

        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $viewData["movies"] = Movie::where('title', 'LIKE', '%' . $searchTerm . '%')->get();
        } else {
            $viewData["movies"] = Movie::all();
        }

        $rating = $request->input('rating');
        if ($rating) {
            $viewData["movies"] = Movie::where('rating', '>=', $rating)->get();
        } else {
            $viewData["movies"] = Movie::all();
        }

        return view('movie.index')->with("viewData", $viewData);
    }

    public function show(int $id) :  View
    {
        $viewData = [];
        $movie = Movie::findOrFail($id);
        $viewData["title"] = $movie->getTitle()." - PopMovies";
        $viewData["subtitle"] = $movie->getTitle()." - Movie information";
        $viewData["movie"] = $movie;
        return view('movie.show')->with("viewData", $viewData);
    }
}
