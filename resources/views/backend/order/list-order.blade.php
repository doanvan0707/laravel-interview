@extends('layouts.admin')
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
          <th>Order ID</th>
          <th>Tên khách hàng</th>
          <th>Date</th>
          <th>Tổng tiền</th>
          <th>Trạng thái</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $key =>  $order)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer->yourname }}</td>
            <td>{{ $order->order_date }}</td>
            <?php
                $orderProducts = App\Order::find($order->id )->orderProducts()->get();
                    $total = 0;
                    foreach ($orderProducts as $orderProduct) {
                        $total += $orderProduct->quantity * $orderProduct->price;
                    }
            ?><td><?php echo number_format($total, '0', ',', '.') ?>&nbsp;VND</td>
            <td>{{ $order->status->name  }}</td>
            <td>
                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-success"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                <a href="" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection
