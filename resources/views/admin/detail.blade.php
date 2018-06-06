@extends('include.layout')

@section('title', 'Thêm lộ tài khoản')

@section('name', 'Thêm lộ tài khoản')

@section('content')
    <form action="{{route('adminNewUser')}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach

        <div class="form-group">
            <label for="name">Tên user:</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="level">Quyển quản trị:</label>
            <select name="level" class="form-control" id="level">
                <option value="1">Quản lý nhiên liệu</option>
                <option value="2">Quản lý xe</option>
                <option value="3">Quản lý lộ trình</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection