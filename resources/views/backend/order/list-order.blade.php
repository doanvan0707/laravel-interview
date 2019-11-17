@extends('backend.layouts.app')
@section('title', 'Tất cả đơn đặt hàng')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Tất cả đơn đặt hàng</h1>
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
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên khách hàng</th>
          <th>Date</th>
          <th>SDT</th>
          <th>Address</th>
          <th>Tổng tiền</th>
          <th>Trạng thái</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $key =>  $order)    
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $order->yourname }}</td>
            <td>35000</td>
            <td>{{ $order->status_id }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection
