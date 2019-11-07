@extends('backend.layouts.app')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Edit danh mục</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Tên</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Parent</label>
            <select name="parent_id" id="" class="form-control">
                <option value="0">NULL</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
@endsection
