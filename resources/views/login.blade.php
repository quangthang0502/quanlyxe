<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập admin</title>
    <link rel="stylesheet" href="{{url('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('node_modules/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/main.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="section" style="margin-top: 30%">
                <h3 class="title">Đăng nhập</h3>
                <div class="section-body">
                    <form action="{{route('login')}}" method="post">
                        {{csrf_field()}}
                        @if($errors->has('email'))
                            <div class="alert alert-danger">{{$errors->first('email')}}</div>
                        @endif
                        @if($errors->has('password'))
                            <div class="alert alert-danger">{{$errors->first('password')}}</div>
                        @endif
                        @if($errors->has('loginError'))
                            <div class="alert alert-danger">{{$errors->first('loginError')}}</div>
                        @endif

                        <div class="form-group">
                            <label for="username">Tài khoản:</label>
                            <input type="text" name="email" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" id="pwd">
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<script src="{{url('node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>

</body>
</html>