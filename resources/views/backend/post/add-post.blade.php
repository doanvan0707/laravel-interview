@extends('backend.layouts.app')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Thêm post</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Content</label>
            <textarea name="content" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Thêm" class="btn btn-primary">
        </div>
    </form>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
