<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('node_modules/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/main.css')}}">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="{{route('home')}}">Dashboard</a>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('logout')}}">Đăng xuất</a>
            </li>
        </ul>
    </nav>
</header>

<section>
    <div class="row">
        <div class="col-md-2 left-bar">
            <ul>
                @if(isAdmin())
                    <li class="active"><a href="">Quan lý người dùng</a></li>
                @endif
                @if(isQuanLyNhienLieu())
                    <li class="active"><a href="">Quan lý nhiên liệu</a></li>
                @endif
                @if(isQuanLyXe())
                    <li class="active"><a href="{{route('quanLyXe')}}">Quan lý xe</a></li>
                    <li><a href="">Thêm Xe mới</a></li>
                @endif
                @if(isTrucBan())
                    <li class="active"><a href="">Quan lý lộ trình</a></li>
                @endif
            </ul>
        </div>
        <div class="col-md-10 right-bar">
            @yield('content')
        </div>
    </div>
</section>


<script src="{{url('node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('js/admin.js')}}"></script>
</body>
</html>