@extends('layouts.app')

@section('content')
<div class="container plants-container">
    <h1> @lang("app.plants_view.plants") </h1>
    <div class="row">
        @foreach ($viewData['plants'] as $plant)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $plant['name'] }}</h5>
                        <p class="card-text">{{ $plant['description'] }}</p>
                        <p class="card-text"> @lang("app.plants_view.price"){{ number_format($plant['price'], 0, ',', '.') }}</p>
                        <p class="card-text"> @lang("app.plants_view.stock") {{ $plant['stock'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
