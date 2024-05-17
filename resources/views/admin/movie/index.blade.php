@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4"> 
    <div class="card-header"> 
        @lang("admin.admin_index_movies.view_title") 
    </div> 
    <div class="card-body"> 
        @if($errors->any()) 
            <ul class="alert alert-danger list-unstyled"> 
            @foreach($errors->all() as $error) 
                <li> - {{ $error }}</li> 
            @endforeach 
            </ul> 
        @endif 
        <form method="POST" action="{{ route('admin.movie.store') }}"  enctype="multipart/form-data"> 
            @csrf 
            <div class="row"> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_index_movies.title")  </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="title" value="{{ old('title') }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_index_movies.director")  </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="director" value="{{ old('director') }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
            </div>
            <div class="row"> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_index_movies.price") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="price" value="{{ old('price') }}" type="number" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_index_movies.stock") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="stock" value="{{ old('stock') }}" type="number" class="form-control"> 
                        </div> 
                    </div> 
                </div>  
            </div>
            <div class="row">
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_index_movies.poster") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input class="form-control" type="file" name="poster"> 
                        </div> 
                    </div> 
                </div>
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_index_movies.genre") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="genre" value="{{ old('genre') }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
            </div>
            <div class="row">
                <div class="mb-3 col"> 
                    <label class="form-label"> @lang("admin.admin_index_movies.plot") </label> 
                    <textarea class="form-control" name="plot" rows="3">{{ old('plot') }}</textarea> 
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> @lang("admin.admin_index_movies.submit") </button> 
        </form> 
    </div> 
</div>
<div class="card">
    <div class="card-header">
        @lang("admin.admin_index_movies.manage_movies")
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped"> 
            <thead>
                <tr>
                    <th scope="col">@lang("admin.admin_index_movies.id")</th>
                    <th scope="col">@lang("admin.admin_index_movies.edit_title")</th>
                    <th scope="col">@lang("admin.admin_index_movies.edit")</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["movies"] as $movie) 
                    <tr> 
                        <td>{{ $movie->getId() }}</td> 
                        <td>{{ $movie->getTitle() }}</td> 
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.movie.edit', ['id'=> $movie->getId()])}}"> 
                                <i class="bi-pencil"></i>
                            </a> 
                        </td> 
                        <td>
                            <form action="{{ route('admin.movie.delete', $movie->getId())}}" method="POST"> 
                                @csrf 
                                @method('DELETE') 
                                <button class="btn btn-danger"> 
                                    <i class="bi-trash"></i> 
                                </button> 
                            </form>
                        </td> 
                    </tr> 
                @endforeach 
            </tbody>
        </table> 
    </div>
</div>
@endsection