<!DOCTYPE HTML>
<html lang="ja">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title')</title>
  </head>

<body>
@include('partials.header')

<div class="container">
  @yield('content')
</div><!-- /.container -->
 
<footer class="footer">
</footer>
 
</body>
</html>