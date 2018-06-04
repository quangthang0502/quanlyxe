@extends('include.layout')

@section('title','Chuyến đi '.$customer->codeCustomer)

@section('name', 'Chuyến đi '.$customer->codeCustomer)

@section("content")
    <div class="row">
        <div class="col-md-6">
            <ul class="t-box">
                <li><span>Chuyến đi mã số:</span> {{$customer->codeCustomer}}</li>
                <li><span>Số điện thoại:</span> {{$customer->phoneNumber}}</li>
                <li><span>Điểm bắt khách:</span> {{$loTrinh->origin}}</li>
                <li><span>Điểm đến:</span> {{$loTrinh->destination}}</li>
                <li><span>Thời gian di chuyển (tính cả đợi khách):</span> {{$loTrinh->time}} Giờ</li>
                <li><span>Quãng đường:</span> {{$loTrinh->numberOfKm}} Km</li>
                <li><span>Thời gian trung bình:</span> {{$loTrinh->mediumTime}} km/h</li>
                <li><span>Giá tiền:</span> {{$loTrinh->fee}} Đồng</li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="t-box">
                <li><span>Mã tài xế :</span> {{$driver->codeDriver}}</li>
                <li><span>Họ và tên :</span> {{$driver->firstName.' '.$driver->lastName}}</li>
                <li><span>Biển số xe:</span> {{$taxi->licenceNumber}}</li>
                <li><span>Model :</span> {{$taxi->model}}</li>
                <li><span>Số lượng ghế :</span> {{$taxi->numberOfSeat}}</li>
                <li><span>Khu vực hoạt động:</span> {{$location->nameLocation}}</li>
            </ul>
        </div>
    </div>
@endsection