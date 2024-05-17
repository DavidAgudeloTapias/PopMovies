@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    @forelse ($viewData["orders"] as $order) 
        <div class="card mb-4">
            <div class="card-header">
                Order #{{ $order->getId() }}
            </div>
            <div class="card-body">
                <b>Date:</b> {{ $order->getCreatedAt() }} <br />
                <b>Total:</b> ${{ $order->getTotal() }} <br />
                <table class="table table-bordered table-striped text-center mt-3">
                    <thead>
                        <tr>
                            <th scope="col">@lang("app.orders_view.item")</th>
                            <th scope="col">@lang("app.orders_view.name")</th>
                            <th scope="col">@lang("app.orders_view.price")</th>
                            <th scope="col">@lang("app.orders_view.quantity")</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->getItems() as $item)
                        <tr>
                            <td>{{ $item->getId() }}</td>
                            <td>
                                <a value="{{ $item->getMovie()->getId() }}"> {{ $item->getMovie()->getTitle() }} </a>
                            </td>
                            <td>${{ $item->getPrice() }}</td>
                            <td>{{ $item->getQuantity() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @empty 
        <div class="alert alert-danger" role="alert">
            @lang("app.orders_view.message")
        </div>
    @endforelse 
@endsection