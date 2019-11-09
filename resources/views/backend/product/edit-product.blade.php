@extends('backend.layouts.app')
@section('title', 'Edit sản phẩm')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Edit sản phẩm</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" placeholder="Enter name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" placeholder="Enter image" class="form-control">
                    <img src="{{ url('uploads/'.$product->image) }}" alt="image">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" value="{{ $product->description }}" placeholder="Enter description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($categories as $category)    
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    </div>
                <div class="form-group">
                    <label for="">Screen</label>
                    <input type="text" name="screen" value="{{ $product->screen }}" placeholder="Enter screen" class="form-control">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">System</label>
                    <input type="text" name="system" value="{{ $product->system }}" placeholder="Enter system" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Fcamera</label>
                    <input type="text" name="fcamera" value="{{ $product->fcamera }}" placeholder="Enter fcamera" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Bcamera</label>
                    <input type="text" name="bcamera" value="{{ $product->bcamera }}" placeholder="Enter bcamera" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{ $product->price }}" placeholder="Enter price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">CPU</label>
                    <input type="text" name="cpu" value="{{ $product->cpu }}" placeholder="Enter cpu" class="form-control">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Ram</label>
                    <input type="text" name="ram" value="{{ $product->ram }}" placeholder="Enter ram" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Rom</label>
                    <input type="text" name="rom" value="{{ $product->rom }}" placeholder="Enter rom" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Smenory</label>
                    <input type="text" name="smenory" value="{{ $product->smenory }}" placeholder="Enter smenory" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Pin</label>
                    <input type="text" name="pin" value="{{ $product->pin }}" placeholder="Enter pin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Qantity</label>
                    <input type="text" name="quantity" value="{{ $product->quantity }}" placeholder="Enter quantity" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="submit" value="Edit" class="btn btn-primary btn-block">
                </div>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </form>
@endsection
