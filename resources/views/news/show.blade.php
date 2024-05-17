@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="container mt-5">
    <div class="news-detail">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- News Header -->
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1">{{ $viewData["news"]->getTitle() }}</h1>
                    <div class="text-muted fst-italic mb-2">@lang("app.news_view.posted") {{ $viewData["news"]->getCreatedAt() }}</div>
                    <a class="badge bg-secondary text-decoration-none link-light">Cinema</a>
                </header>
                
                <!-- Preview Image -->
                <figure class="mb-4">
                    <img class="img-fluid rounded" src="{{ asset('/storage/'.$viewData["news"]->getImage()) }}" alt="{{ $viewData["news"]->getTitle() }}" />
                </figure>
                
                <!-- News Content -->
                <section class="mb-5">
                    <p class="fs-5 mb-4" style="white-space: pre-line;">{{ $viewData["news"]->getContent() }}</p>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
