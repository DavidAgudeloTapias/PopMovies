@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
    <div class="card-header">
        @lang("admin.admin_index.title")
    </div>
    <div class="card-body">
        @lang("admin.admin_index.text")
    </div>
</div>
@endsection