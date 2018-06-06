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
    <link rel="stylesheet" href="{{url('css/sb-admin.min.css')}}">
    <link rel="stylesheet" href="{{url('css/main.css')}}">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('home')}}">ThanhCongTaxi</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            @if(isAdmin())
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{route('admin')}}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Quản Lý Người dùng</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{route('adminNewUser')}}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Thêm người dùng</span>
                    </a>
                </li>
            @endif
            @if(isQuanLyNhienLieu())
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{route('nhienLieu')}}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Quản Lý Tiếp Nhiên Liệu</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{route('nhapNhienLieu')}}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Tạo phiếu mới</span>
                    </a>
                </li>
            @endif
            @if(isQuanLyXe())
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{route('quanLyXe')}}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Quản Lý Xe</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{route('listTaxi')}}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Danh sách xe</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                    <a class="nav-link" href="{{route('listDriver')}}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Danh sách tài xế</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                    <a class="nav-link" href="{{route('showFormAddDriver')}}">
                        <i class="fa fa-fw fa-link"></i>
                        <span class="nav-link-text">Thêm tài xế mới</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                    <a class="nav-link" href="{{route('formNewTaxi')}}">
                        <i class="fa fa-fw fa-link"></i>
                        <span class="nav-link-text">Thêm Xe Mới</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                    <a class="nav-link" href="{{route('phanXe')}}">
                        <i class="fa fa-fw fa-link"></i>
                        <span class="nav-link-text">Phân xe và khu vực</span>
                    </a>
                </li>
            @endif
            @if(isTrucBan())
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{route('loTrinh')}}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Quản Lý lộ trình</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{route('themLoTrinh')}}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Thêm lộ trình mới</span>
                    </a>
                </li>
            @endif
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{{route('changePassword')}}">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Đổi mật khẩu</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fa fa-fw fa-user"></i>{{getUser()->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"> @yield('name')</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{url('node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('js/admin.js')}}"></script>
</body>
</html>