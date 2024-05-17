@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
    <div class="card-header">
    @lang("app.cart_view.complete")
    </div>
    <div class="card-body">
        <div class="alert alert-success" role="alert">@lang("app.cart_view.congrats")<b>#{{ $viewData["order"]->getId() }}</b> </div>
    </div>
</div>
@endsection