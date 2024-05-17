@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang("admin.admin_edit_movies.view_title")
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
                <li> - {{ $error }} </li>
            @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.movie.update', ['id'=> $viewData['movie']->getId()]) }}" enctype="multipart/form-data"> 
            @csrf
            @method('PUT') 
            <div class="row"> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_edit_movies.title") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="title" value="{{ $viewData['movie']->getTitle() }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_edit_movies.director") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="director" value="{{ $viewData['movie']->getDirector() }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
            </div>
            <div class="row"> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_edit_movies.price") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="price" value="{{ $viewData['movie']->getPrice() }}" type="number" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_edit_movies.stock") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="stock" value="{{ $viewData['movie']->getStock() }}" type="number" class="form-control"> 
                        </div> 
                    </div> 
                </div>  
            </div>
            <div class="row">
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_edit_movies.poster") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input class="form-control" type="file" name="poster"> 
                        </div> 
                    </div> 
                </div>
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_edit_movies.genre") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="genre" value="{{ $viewData['movie']->getGenre() }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
            </div>
            <div class="row">
                <div class="mb-3 col"> 
                    <label class="form-label"> @lang("admin.admin_edit_movies.plot") </label> 
                    <textarea class="form-control" name="plot" rows="3">{{ $viewData['movie']->getPlot() }}</textarea> 
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> @lang("admin.admin_edit_movies.edit") </button> 
        </form>
    </div>
</div>
@endsection