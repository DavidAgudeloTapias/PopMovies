@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4"> 
    <div class="card-header"> 
        @lang("admin.admin_index_news.view_title") 
    </div> 
    <div class="card-body"> 
        @if($errors->any()) 
            <ul class="alert alert-danger list-unstyled"> 
            @foreach($errors->all() as $error) 
                <li> - {{ $error }}</li> 
            @endforeach 
            </ul> 
        @endif 
        <form method="POST" action="{{ route('admin.news.store') }}"  enctype="multipart/form-data"> 
            @csrf 
            <div class="row"> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_index_news.title")  </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="title" value="{{ old('title') }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_index_news.source") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input name="source" value="{{ old('source') }}" type="text" class="form-control"> 
                        </div> 
                    </div> 
                </div> 
            </div>
            <div class="row">
                <div class="col"> 
                    <div class="mb-3 row"> 
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label"> @lang("admin.admin_index_news.image") </label> 
                        <div class="col-lg-10 col-md-6 col-sm-12"> 
                            <input class="form-control" type="file" name="image"> 
                        </div> 
                    </div> 
                    <div class="mb-3 col"> 
                        <label class="form-label"> @lang("admin.admin_index_news.content") </label> 
                        <textarea class="form-control" name="content" rows="3">{{ old('content') }}</textarea> 
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> @lang("admin.admin_index_news.submit") </button> 
        </form> 
    </div> 
</div>
<div class="card">
    <div class="card-header">
        @lang("admin.admin_index_news.manage_news")
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped"> 
            <thead>
                <tr>
                    <th scope="col">@lang("admin.admin_index_news.id")</th>
                    <th scope="col">@lang("admin.admin_index_news.edit_title")</th>
                    <th scope="col">@lang("admin.admin_index_news.edit")</th>
                    <th scope="col">@lang("admin.admin_index_news.delete")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["news"] as $news) 
                    <tr> 
                        <td>{{ $news->getId() }}</td> 
                        <td>{{ $news->getTitle() }}</td> 
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.news.edit', ['id'=> $news->getId()])}}"> 
                                <i class="bi-pencil"></i>
                            </a> 
                        </td> 
                        <td>
                            <form action="{{ route('admin.news.delete', $news->getId())}}" method="POST"> 
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