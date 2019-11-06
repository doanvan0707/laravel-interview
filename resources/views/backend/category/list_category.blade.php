@extends('backend.layouts.app')
@section('title', 'Tất cả chuyên mục')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Danh sách category</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <a class="btn btn-outline-success" href="{{ route('admin.category.create') }}">Thêm danh mục</a>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $key => $category)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $category->name }}
                        <tr>
                            @foreach($category->children as $children)
                                <td>{{ $children->name }}</td>
                            @endforeach
                        </tr>
                    </td>
                    <td>Chỉnh sửa | Xóa</td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
