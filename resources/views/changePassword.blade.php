@extends('include.layout')

@section('title', 'Đổi mật khẩu')

@section('name', 'Đổi mật khẩu')

@section('content')
    <form action="{{route('changePassword')}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach

        <input type="hidden" name="id" value="{{getUser()->id}}">
        <div class="form-group">
            <label for="old_password">Mật khẩu cũ:</label>
            <input type="password" name="old_password" class="form-control" id="old_password">
        </div>
        <div class="form-group">
            <label for="password">Mật Khẩu mới:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Nhập lại mật khẩu:</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection