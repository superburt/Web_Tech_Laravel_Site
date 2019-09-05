<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/wp.css')}}">
  
</head>

<body>
        <div class="navbar">
                <a href="{{URL("/")}}">Home</a>
                <a href="{{URL("/Documentation")}}" >Documentation</a>
                <a href="{{URL("/unique_users")}}" >Unique User Posts</a>
                <a href="{{URL("/recent_posts")}}" >Most Recent</a>
        </div>
        <div class="content">
                @yield('content')
        </div>
</body>
</html>

