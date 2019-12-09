@extends('layouts.admin')
@section('title', 'Thêm sản phẩm')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Thêm sản phẩm</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Name</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="name" placeholder="Enter name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="file" name="image" placeholder="Enter image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input required  oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="description" placeholder="Enter description" class="form-control">
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
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="screen" placeholder="Enter screen" class="form-control">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">System</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="system" placeholder="Enter system" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Fcamera</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="fcamera" placeholder="Enter fcamera" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Bcamera</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="bcamera" placeholder="Enter bcamera" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="price" placeholder="Enter price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">CPU</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="cpu" placeholder="Enter cpu" class="form-control">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Ram</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="ram" placeholder="Enter ram" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Rom</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="rom" placeholder="Enter rom" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Smenory</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="smenory" placeholder="Enter smenory" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Pin</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="pin" placeholder="Enter pin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input required oninvalid="this.setCustomValidity('Trường này là bắt buộc')"
                    oninput="this.setCustomValidity('')" type="text" name="quantity" placeholder="Enter quantity" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="submit" value="Thêm" class="btn btn-primary btn-block">
                </div>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </form>
@endsection
