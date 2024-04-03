@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('/storage/'.$viewData["movie"]->getPoster()) }}" class="img-fluid rounded-start"> 
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData["movie"]->getTitle() }} (${{ $viewData["movie"]->getPrice() }}) 
                </h5>
                <p class="card-text">{{ $viewData["movie"]->getGenre() }}</p>
                <p class="card-text"><b>Plot:</b> {{ $viewData["movie"]->getPlot() }}</p>
                <p class="card-text"><b>Rating:</b> {{ $viewData["movie"]->getRating() }}</p>
                <p class="card-text"><b>Available stock:</b> {{ $viewData["movie"]->getStock() }}</p>
                @auth
                    <p class="card-text"> 
                        <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['movie']->getId()]) }}"> 
                            <div class="row"> 
                                @csrf 
                                <div class="col-auto"> 
                                    <div class="input-group col-auto"> 
                                        <div class="input-group-text">Quantity</div> 
                                        <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1"> 
                                    </div> 
                                </div> 
                                <div class="col-auto"> 
                                    <button class="mt-auto btn btn-primary-outline" type="submit">Add to cart</button> 
                                </div> 
                            </div> 
                        </form> 
                        <div class="row">
                            <div class="col mt-4">
                                <form class="py-2 px-4" action="{{route('review.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                    @csrf
                                    <p class="font-weight-bold ">Add a review about this movie</p>
                                    <div class="form-group row">
                                        <input type="hidden" name="movie_id" value="{{ $viewData['movie']->getId() }}">
                                        <div class="col">
                                            <div class="rate">
                                                <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col">
                                            <textarea class="form-control" name="comment" rows="6 " placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-right">
                                        <button type="submit" class="btn btn-primary-outline">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success" style="margin-top: 20px;">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" style="margin-top: 20px;">
                                {{ session('error') }}
                            </div>
                        @endif
                    </p>
                @endauth
            </div>
        </div>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Reviews</h5>
        @forelse ($viewData["movie"]->getReviews() as $review)
            <div class="review mb-3">
                <div>
                    <strong>{{ $review->getUser()->getName() }}</strong> <!-- Asegúrate de que cada reseña tiene asociado un usuario -->
                    @for ($i = 0; $i < $review->getRating(); $i++)
                        <span class="fa{{ $i < $review->getRating() ? ' star-rating-complete' : '-o' }}">★</span>
                    @endfor
                </div>
                <p>{{ $review->getComment() }}</p>
            </div>
        @empty
            <p>No reviews yet.</p>
        @endforelse
    </div>
</div>
@endsection