<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('frontend/app.css') }}">
</head>
<body>
  <header>
    <div class="wrap-menu">
      <div class="container">
        <ul>
          <li><a href="{{ route('frontend.index') }}">Home</a></li>
          <li><a href="">Product</a></li>
          <li><a href="">News</a></li>
          <li><a href="">Contact</a></li>
          <li><a href=""><i class="fa fa-cart-plus" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    </div>
  </header>
  <div class="container">
    @yield('content')
  </div>
  <footer class="pt-3 pb-3">
      Web created by vandev :))
    </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>