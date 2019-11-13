@extends('backend.layouts.app')
@section('title', 'Edit role')
@section('content')
  <div class="app-title">
    <div>
        <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Edit Role</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
    </ul>
  </div>
  <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="">Name</label>
      <input type="text" class="form-control" name="name" value="{{ $role->name }}">
    </div>
    <div class="form-group">
      <input type="submit" value="Update role" class="btn btn-outline-primary">
    </div>
  </form>
@endsection