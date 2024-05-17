@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@auth
    <div class="row mb-3">
        <div class="col">
            <h2 class="filter-title">@lang("app.movie_view.filters")</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="filter-section">
                <form action="{{ route('movie.index') }}" method="GET" class="d-flex">
                    <input type="text" class="form-control" name="search" placeholder="@lang("app.movie_view.search_title")" autocomplete="off">
                    <button class="btn btn-primary-outline" type="submit">@lang("app.movie_view.search")</button>
                </form>
                <form action="{{ route('movie.index') }}" method="GET">
                    <div class="d-flex align-items-center">
                        <label for="rating-filter" class="me-2">@lang("app.movie_view.minimum_rating")</label>
                        <input type="range" class="form-range me-2" name="rating" min="1" max="5" step="1" id="rating-filter">
                        <span id="rating-value" class="me-2">3</span>
                        <button class="btn btn-primary-outline" type="submit">@lang("app.movie_view.search")</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endauth
<div class="row">
    @foreach ($viewData["movies"] as $movie) 
        <div class="col-md-4 col-lg-3 mb-2"> 
            <div class="card"> 
                <img src="{{ asset('/storage/'.$movie->getPoster()) }}" class="card-img-top movie-img-card"> 
                <div class="card-body text-center"> 
                    <a href="{{ route('movie.show', ['id'=> $movie->getId()]) }}" class="mt-auto btn btn-primary-outline"> {{ $movie->getTitle() }} </a> 
                </div> 
            </div> 
        </div> 
    @endforeach 
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let ratingInput = document.getElementById('rating-filter');
        let ratingValueDisplay = document.getElementById('rating-value');

        ratingInput.addEventListener('input', function() {
            ratingValueDisplay.textContent = ratingInput.value;
        });
    });
</script>
@endsection