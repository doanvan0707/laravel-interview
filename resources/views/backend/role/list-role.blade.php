@extends('backend.layouts.app')
@section('title', 'All Role')
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
    <a class="btn btn-outline-success" href="{{ route('admin.roles.create') }}">Add role</a>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($roles as $key => $role)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $role->name }}</td>
              <td>
                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-outline-warning">Edit</a>
                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" value="Delete" onclick="confirm('ban chac chan khong?')" class="btn btn-outline-danger">
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
@endsection
