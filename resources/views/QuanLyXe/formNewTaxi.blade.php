@extends('include.layout')

@section('title', 'Thêm xe mới')

@section('name', 'Thêm xe mới')

@section('content')
    <form action="{{route('formNewTaxi')}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Biển số</label>
                    <input type="text" name="licenceNumber" class="form-control" id="licenceNumber">
                </div>
                <div class="form-group">
                    <label for="Model">Model</label>
                    <input type="text" name="model" class="form-control" id="model">
                </div>
                <div class="form-group">
                    <label for="numberOfSeat">Số lượng ghế:</label>
                    <input type="text" name="numberOfSeat" class="form-control" id="numberOfSeat">
                </div>
                <div class="form-group">
                    <label for="">Khu vực hoạt động</label>
                    <select name="codeLocation" id="codeLocation" class="form-control">
                        @foreach($location as $b)
                            <option value="{{$b->codeLocation}}">{{$b->nameLocation}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="codeDriver">Mã tài xế:</label>
                    <input type="text" name="codeDriver" class="form-control" id="codeDriver">
                </div>
                <div class="form-group">
                    <label for="firstName">Nhập họ và tên đệm:</label>
                    <input type="text" name="firstName" class="form-control" id="firstName">
                </div>
                <div class="form-group">
                    <label for="lastName">Nhập tên tài xế:</label>
                    <input type="text" name="lastName" class="form-control" id="lastName">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Số điện thoại:</label>
                    <input type="text" name="phoneNumber" class="form-control" id="phoneNumber">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection