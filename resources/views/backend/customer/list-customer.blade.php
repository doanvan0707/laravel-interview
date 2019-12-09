@extends('layouts.admin')
@section('title', 'All User')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;All Customer</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
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
            <th>Yourname</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customers as $key => $customer)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $customer->yourname }}</td>
                <td>0{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
