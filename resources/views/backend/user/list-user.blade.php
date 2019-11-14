@extends('backend.layouts.app')
@section('title', 'All User')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;All User</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <a class="btn btn-outline-success" href="{{ route('admin.users.create') }}">Add User</a>
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
    @include('notify::messages')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Username</th>
                <th>Email</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($users as $key => $user)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->role->name }}</td>
              <td>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-warning">Edit</a>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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
