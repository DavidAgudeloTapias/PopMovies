@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="row mb-3">
    <div class="col">
        <h2 class="filter-title">@lang("app.news_view.filter")</h2>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <div class="filter-section">
            <form action="{{ route('news.index') }}" method="GET">
                <div class="input-group">
                    <select class="form-control select-filter" name="order" onchange="this.form.submit()">
                        <option value="">@lang("app.news_view.date")</option>
                        <option value="desc">@lang("app.news_view.recent")</option>
                        <option value="asc">@lang("app.news_view.oldest")</option>
                    </select>
                </div>
            </form>
            <form action="{{ route('news.index') }}" method="GET">
                <div class="input-group">
                    <select class="form-control" name="alphabetical" onchange="this.form.submit()">
                        <option value="">@lang("app.news_view.order")</option>
                        <option value="asc">A - Z</option>
                        <option value="desc">Z - A</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="news-container">
    <div class="row">
        @foreach ($viewData["news"] as $news)
            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="card shadow-sm">
                    <img src="{{ asset('/storage/'.$news->getImage()) }}" class="card-img-top img-fluid" alt="{{ $news->getTitle() }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $news->getTitle() }}</h5>
                        <p class="card-text text-truncate">{{ $news->getContent() }}</p>
                        <a href="{{ route('news.show', ['id'=> $news->getId()]) }}" class="mt-auto btn btn-primary-outline">@lang("app.news_view.read")</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
