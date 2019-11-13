@extends('frontend.layouts.app')
@section('content')
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ url('images/slide-1.png') }}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ url('images/slide-2.png') }}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ url('images/slide-3.png') }}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <h2 class="text-center mt-5 mt-5">Sản phẩm</h2>
  <div class="row">
    @foreach ($products as $product)    
      <div class="col-lg-4">
        <div class="card" style="width: 18rem;">
          <a href="{{ route('frontend.get-detail-product', $product->id) }}"><img src="{{ url('uploads/'.$product->image) }}" alt="image"></a>
          <div class="card-body">
            <a href="{{ route('frontend.get-detail-product', $product->id) }}"><h5 class="card-title">{{ $product->name }}</h5></a>
            <p class="card-text">{{ $product->price }}</p>
            <a href="{{ route('frontend.add-to-cart', $product->id) }}" class="btn btn-primary">Add to cart</a>
          </div>
        </div>
      </div>
    @endforeach
    @if(Session::has('product'))
      <p class="alert alert-danger">{{ Session::get('product') }}</p> 
    @endif
  </div>
@endsection