<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;

class MovieApiController extends Controller
{
    public function index(): JsonResponse
    {
        $movies = MovieResource::collection(Movie::all());
        return response()->json($movies, 200);
    }

    public function show(string $id): JsonResponse
    {
        $movie = new MovieResource(Movie::findOrFail($id));
        return response()->json($movie, 200);
    }
}

