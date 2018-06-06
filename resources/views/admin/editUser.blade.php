@extends('include.layout')

@section('title', 'Sửa user '.$user->name)

@section('name', 'Sửa user '.$user->name)

@section('content')
    <form action="{{route('adminEditUser', $user->id)}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach

        <div class="form-group">
            <label for="name">Tên user:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="level">Quyển quản trị:</label>
            <select name="level" class="form-control" id="level">
                <option value="1" @if($user->level == 1) selected @endif>Quản lý nhiên liệu</option>
                <option value="2" @if($user->level == 2) selected @endif>Quản lý xe</option>
                <option value="3" @if($user->level == 3) selected @endif>Quản lý lộ trình</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
    <form action="{{route('newPassword',$user->id)}}" method="post" style="padding: 5px; border-top:2px solid #e1e1e1; margin-top: 20px">
        {{csrf_field()}}
        <div class="form-group">
            <label for="password">Mật khẩu mới:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary" style="float:right;">Đổi mật khẩu</button>
    </form>
@endsection