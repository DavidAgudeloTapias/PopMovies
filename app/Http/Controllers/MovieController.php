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
        $viewData["title"] = trans("app.movie_controller.title");
        $viewData["subtitle"] = trans("app.movie_controller.subtitle");

        $searchTerm = $request->input('search');
        $rating = $request->input('rating');

        if ($searchTerm) {
            $viewData["movies"] = Movie::where('title', 'LIKE', '%' . $searchTerm . '%')->get();
        } elseif ($rating) {
            $viewData["movies"] = Movie::where('rating', '>=', $rating)->get();
        } else{
            $viewData["movies"] = Movie::all();
        }

        return view('movie.index')->with("viewData", $viewData);
    }

    public function show(int $id) :  View
    {
        $viewData = [];
        $movie = Movie::findOrFail($id);
        $viewData["title"] = $movie->getTitle()." - PopMovies";
        $viewData["subtitle"] = $movie->getTitle()." - ".trans("app.movie_controller.info");
        $viewData["movie"] = $movie;
        return view('movie.show')->with("viewData", $viewData);
    }
}
