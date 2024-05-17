@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang("admin.admin_edit_news.view_title")
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
                <li> - {{ $error }} </li>
            @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.news.update', ['id'=> $viewData['news']->getId()]) }}" enctype="multipart/form-data"> 
            @csrf
            @method('PUT') 
            <div class="row"> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_edit_news.title") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="title" value="{{ $viewData['news']->getTitle() }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_edit_news.source") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="source" value="{{ $viewData['news']->getSource() }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
            </div>
            <div class="row">
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_edit_news.image") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input class="form-control" type="file" name="image"> 
                        </div> 
                    </div> 
                    <div class="mb-3 col"> 
                        <label class="form-label"> @lang("admin.admin_edit_news.content") </label> 
                        <textarea class="form-control" name="content" rows="3">{{ $viewData['news']->getContent() }}</textarea> 
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> @lang("admin.admin_edit_news.edit") </button> 
        </form>
    </div>
</div>
@endsection