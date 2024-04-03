@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
    <div class="card-header">
        Products in Cart
    </div>
    <div class="card-body">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["movies"] as $movie)
                    <tr>
                        <td>{{ $movie->getId() }}</td>
                        <td>{{ $movie->getTitle() }}</td>
                        <td>${{ $movie->getPrice() }}</td>
                        <td>{{ session('movies')[$movie->getId()] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
            <a class="btn btn-secondary mb-2 no-pointer"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
                @if (count($viewData["movies"]) > 0)
                    <a href="{{ route('cart.purchase') }}" class="btn btn-primary-outline mb-2">Purchase</a>
                    <a href="{{ route('cart.delete') }}">
                        <button class="btn btn-danger mb-2"> Remove all movies from cart </button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
