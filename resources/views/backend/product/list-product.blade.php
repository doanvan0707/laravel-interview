@extends('backend.layouts.app')
@section('title', 'Tất cả sản phẩm')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Danh sách sản phẩm</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <a class="btn btn-outline-success" href="{{ route('admin.products.create') }}">Thêm sản phẩm</a>
    <div class="alert-danger">
        {{ session('error') }}
    </div>
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @include('notify::messages')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img style="width: 100px; height: 100px; object-fit: cover" src="{{ url('uploads/'.$product->image) }}" alt="image"></td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ number_format($product->price, '0', ',', '.') }}&nbsp;VND</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger" onclick="confirm('ban chac chan khong?')">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
