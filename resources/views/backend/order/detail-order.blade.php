@extends('layouts.admin')
@section('content')
    @foreach($orderProducts as $key => $orderProduct)
        <h2>Chi tiết đơn đặt hàng</h2>
    @endforeach
@endsection
