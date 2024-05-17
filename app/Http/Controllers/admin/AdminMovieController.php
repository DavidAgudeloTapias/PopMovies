<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminMovieController extends Controller
{
    public function index() : View
    {
        $viewData = [];
        $viewData["title"] = trans("admin.movie_controller.index_title");
        $viewData["movies"] = Movie::all();
        return view('admin.movie.index')->with("viewData", $viewData);
    }

    public function store(Request $request) : RedirectResponse
    {
        $newMovie = new Movie();
        $newMovie->setTitle($request->input('title'));
        $newMovie->setDirector($request->input('director'));
        $newMovie->setGenre($request->input('genre'));
        $newMovie->setPrice($request->input('price'));
        $newMovie->setStock($request->input('stock'));
        $newMovie->setPlot($request->input('plot'));
        $newMovie->setPoster("game.png");
        $newMovie->save();

        if ($request->hasFile('poster')) {
            $imageName = $newMovie->getId().".".$request->file('poster')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('poster')->getRealPath())
            );
            $newMovie->setPoster($imageName);
            $newMovie->save();
        }

        return back();
    }

    public function delete(int $id) : RedirectResponse
    {
        Movie::destroy($id);
        return back();
    }

    public function edit(int $id) : View
    {
        $viewData = [];
        $viewData["title"] = trans("admin.movie_controller.edit_title");
        $viewData["movie"] = Movie::findOrFail($id);
        return view('admin.movie.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, int $id) : RedirectResponse
    {
        $movie = Movie::findOrFail($id);
        $movie->setTitle($request->input('title'));
        $movie->setDirector($request->input('director'));
        $movie->setGenre($request->input('genre'));
        $movie->setPrice($request->input('price'));
        $movie->setStock($request->input('stock'));
        $movie->setPlot($request->input('plot'));

        if ($request->hasFile('poster')) {
            $imageName = $movie->getId().".".$request->file('poster')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('poster')->getRealPath())
            );
            $movie->setPoster($imageName);
            $movie->save();
        }

        $movie->save();

        return redirect()->route('admin.movie.index');
    }
}
