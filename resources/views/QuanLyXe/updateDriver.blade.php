@extends('include.layout')

@section('title', 'Cập nhập tài xế mới')

@section('name', 'Cập nhập tài xế mới')

@section('content')
    <form action="{{route('capNhapTaiXe',$driver->codeDriver)}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="codeDriver">Mã tài xế:</label>
                    <input type="text" name="codeDriver" class="form-control" id="codeDriver"
                           value="{{$driver->codeDriver}}">
                </div>
                <div class="form-group">
                    <label for="firstName">Nhập họ và tên đệm:</label>
                    <input type="text" name="firstName" class="form-control" id="firstName"
                           value="{{$driver->firstName}}">
                </div>
                <div class="form-group">
                    <label for="lastName">Nhập tên tài xế:</label>
                    <input type="text" name="lastName" class="form-control" id="lastName"
                           value="{{$driver->lastName}}">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <select name="gender" id="" class="form-control">
                        <option value="1" @if($driver->gender == 1) selected @endif>Nam</option>
                        <option value="2" @if($driver->gender == 2) selected @endif>Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Số điện thoại:</label>
                    <input type="text" name="phoneNumber" class="form-control" id="phoneNumber"
                           value="{{$driver->phoneNumber}}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{$driver->email}}">
                </div>
                <div class="form-group">
                    <label for="birthday">Ngày sinh :</label>
                    <input type="date" name="birthday" class="form-control" id="birthday"
                           value="{{$driver->birthday}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" class="form-control" id="address"
                           value="{{$driver->address}}">
                </div>
                <div class="form-group">
                    <label for="cardNumber">Chứng minh nhân dân :</label>
                    <input type="text" name="cardNumber" class="form-control" id="cardNumber"
                           value="{{$driver->cardNumber}}">
                </div>
                <div class="form-group">
                    <label for="danToc">Dân tộc :</label>
                    <input type="text" name="danToc" class="form-control" id="danToc" value="{{$driver->danToc}}">
                </div>
                <div class="form-group">
                    <label for="relationship">Tình trạng hôn nhân :</label>
                    <input type="text" name="relationship" class="form-control" id="relationship"
                           value="{{$driver->relationship}}">
                </div>
                <div class="form-group">
                    <label for="religion">Tôn giáo :</label>
                    <input type="text" name="religion" class="form-control" id="religion"
                           value="{{$driver->religion}}">
                </div>
                <div class="form-group">
                    <label for="educationalLevel">Trình độ học vấn :</label>
                    <input type="text" name="educationalLevel" class="form-control" id="educationalLevel"
                           value="{{$driver->educationalLevel}}">
                </div>
                <div class="form-group">
                    <label for="story">Tiểu sử :</label>
                    <input type="text" name="story" class="form-control" id="story" value="{{$driver->story}}">
                </div>
                <div class="form-group">
                    <label for="description">Khác :</label>
                    <input type="text" name="description" class="form-control" id="description"
                           value="{{$driver->description}}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection