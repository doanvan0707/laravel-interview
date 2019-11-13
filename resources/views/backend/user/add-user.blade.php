@extends('backend.layouts.app')
@section('title', 'Add User')
@section('content')
  <div class="app-title">
    <div>
        <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Add User</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
    </ul>
  </div>
  <form action="{{ route('admin.users.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-lg-3">
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email" class="form-control">
        </div>
      </div>
      <div class="col-lg-3">
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Role</label>
          <select name="role_id" id="" class="form-control">
            @foreach ($roles as $role)
              <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="form-group">
          <label for="">Yourname</label>
          <input type="text" name="yourname" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" name="address" class="form-control">
        </div>
      </div>
      <div class="col-lg-3">
        <div class="form-group">
          <label for="">Phone</label>
          <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary btn-block" value="Add User">
        </div>
      </div>
    </div>
  </form>
@endsection