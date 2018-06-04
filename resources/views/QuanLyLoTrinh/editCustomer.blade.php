@extends('include.layout')

@section('title', 'Sửa lộ trình '. $customer->codeCustomer)

@section('name', 'Sửa lộ trình '. $customer->codeCustomer)

@section('content')
    <form action="{{route('suaLoTrinh',$customer->codeCustomer)}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="codeCustomer">Mã khách hàng:</label>
                    <input type="text" name="codeCustomer" class="form-control" id="codeCustomer"
                           value="{{$customer->codeCustomer}}" readonly>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Số điện thoại:</label>
                    <input type="text" name="phoneNumber" class="form-control" id="phoneNumber"
                           value="{{$customer->phoneNumber}}">
                </div>
                <div class="form-group">
                    <label for="number">Số người:</label>
                    <input type="text" name="number" class="form-control" id="number" value="{{$customer->number}}">
                </div>
                <div class="form-group">
                    <label for="codeDriver">Tài xế:</label>
                    <select name="codeDriver" id="codeDriver" class="form-control">
                        @foreach($result as $a)
                            <option value="{{$a['codeDriver']}}"
                                    @if($a['codeDriver'] == $customer->codeDriver) selected @endif>
                                {{$a['name'].' - '.$a['licenceNumber']}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="licenceNumber" value="{{$a['licenceNumber']}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="origin">Điểm đón:</label>
                    <input type="text" name="origin" class="form-control" id="origin" value="{{$loTrinh->origin}}">
                </div>
                <div class="form-group">
                    <label for="destination">Điểm đến:</label>
                    <input type="text" name="destination" class="form-control" id="destination" value="{{$loTrinh->destination}}">
                </div>
                <div class="form-group">
                    <label for="time">Thời gian di chuyển:</label>
                    <input type="text" name="time" class="form-control" id="time" value="{{$loTrinh->time}}">
                </div>
                <div class="form-group">
                    <label for="numberOfKm">Quãng đường di chuyển:</label>
                    <input type="text" name="numberOfKm" class="form-control" id="numberOfKm" value="{{$loTrinh->numberOfKm}}">
                </div>
                <div class="form-group">
                    <label for="fee">Giá tiền:</label>
                    <input type="text" name="fee" class="form-control" id="fee" value="{{$loTrinh->fee}}">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection