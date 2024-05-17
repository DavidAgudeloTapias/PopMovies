@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <img src="{{ asset('/img/Logo_PopMovies.png') }}" class="img-fluid rounded mx-auto d-block" alt="Logo PopMovies">
            <div class="mt-4">
                <p class="lead">@lang("app.home_view.message")</p>
            </div>
        </div>
    </div>
</div>
@endsection