@extends('layouts.admin')
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
    <a class="btn btn-outline-success" href="{{ route('admin.categories.create') }}">Thêm danh mục</a>
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
                    <td>
                        {{ $category->name }} <br />
                        <ul>
                            @foreach ($category->children as $child)
                            <li>
                                <a href="">{{ $child->name }}</a>
                                <a href="{{ route('admin.categories.edit', $child->id) }}">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $child->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete">
                                </form>
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <button class="btn btn-danger" data-categoryid="{{ $category->id }}" data-toggle="modal" data-target="#delete1" title="Xóa danh mục"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal modal-danger fade" id="delete1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.categories.destroy','test') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p class="text-center">
                            Bạn chắc chắn muốn xóa danh mục này?
                        </p>
                        <input type="hidden" name="category_id" id="category_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Không, quay lại</button>
                        <button type="submit" class="btn btn-warning">Có</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
