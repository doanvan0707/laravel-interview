@extends('frontend.layouts.app')
@section('content')
  Cart page
  @if(Session::has('product'))
    <p class="alert alert-danger">{{ Session::get('product') }}</p> 
  @endif
    {{ $arr['name'] }}
    {{ $arr['age'] }}
@endsection