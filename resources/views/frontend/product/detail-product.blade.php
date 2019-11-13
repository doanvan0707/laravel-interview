@extends('frontend.layouts.app')
@section('content')
  <div class="row mt-5">
    <div class="col-lg-5">
        <img src="{{ url('uploads/'.$product->image) }}" alt="image">
    </div>
    <div class="col-lg-7">
      <p class="newarrival text-center">NEW</p>
      <h2>{{ $product->name }}</h2>
      <p>Product SKU: {{ $product->id }}</p>
      <p class="price">Giá niêm yết: {{ $product->price }}VND</p>
      <p><b>Brand:</b> {{ $product->category->name }}</p>
      <div>
        <label for="">Quantity: </label>
        <button>-</button>
        <input type="text" class="quantity-count" value="1">
        <button>+</button>
      </div>
      <a href="{{ route('frontend.add-to-cart', $product->id) }}" class="btn btn-danger">Mua ngay</a>
      <a href="" class="btn btn-outline-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ hàng</a>
    </div>
  </div>
  <div class="mt-5">
    <h3>Sản phẩm liên quan</h3>
    <div class="row">
        @foreach ($products as $product)    
          <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <a href="{{ route('frontend.get-detail-product', $product->id) }}"><img src="{{ url('uploads/'.$product->image) }}" alt="image"></a>
              <div class="card-body">
                <a href="{{ route('frontend.get-detail-product', $product->id) }}"><h5 class="card-title">{{ $product->name }}</h5></a>
                <p class="card-text">{{ $product->price }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>
@endsection