@extends('layouts.admin')
@section('title', 'Tất cả bài viết')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Danh sách post</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <a class="btn btn-outline-success" href="{{ route('admin.posts.create') }}">Thêm post</a>
    @if(Session::has('error'))
    <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection
