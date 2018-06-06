@extends('include.layout')

@section('title', 'Thêm lộ trình mới')

@section('name', 'Thêm lộ trình mới')

@section('content')
    <form action="{{route('themLoTrinh')}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="codeCustomer">Mã khách hàng:</label>
                    <input type="text" name="codeCustomer" class="form-control" id="codeCustomer" value="{{$random}}" readonly>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Số điện thoại:</label>
                    <input type="text" name="phoneNumber" class="form-control" id="phoneNumber">
                </div>
                <div class="form-group">
                    <label for="number">Số người:</label>
                    <input type="text" name="number" class="form-control" id="number">
                </div>
                <div class="form-group">
                    <label for="codeDriver">Tài xế:</label>
                    <select name="codeDriver" id="codeDriver" class="form-control">
                        @foreach($result as $a)
                            <option value="{{$a['codeDriver']}}">{{$a['name'].' - '.$a['licenceNumber']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="origin">Điểm đón:</label>
                    <input type="text" name="origin" class="form-control" id="origin">
                </div>
                <div class="form-group">
                    <label for="destination">Điểm đến:</label>
                    <input type="text" name="destination" class="form-control" id="destination">
                </div>
                <div class="form-group">
                    <label for="time">Thời gian di chuyển:</label>
                    <input type="text" name="time" class="form-control" id="time">
                </div>
                <div class="form-group">
                    <label for="numberOfKm">Quãng đường di chuyển:</label>
                    <input type="text" name="numberOfKm" class="form-control" id="numberOfKm">
                </div>
                <div class="form-group">
                    <label for="fee">Giá tiền:</label>
                    <input type="text" name="fee" class="form-control" id="fee">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection