@extends('frontend.layouts.app')
@section('content')
  Cart page
  @if(Session::has('products'))
  <div class="alert alert-danger">
      {{ session('products') }}
  </div>
@endif
@endsection