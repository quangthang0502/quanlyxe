@extends('include.layout')

@section('title','Xe taxi biển số '. $taxi->licenceNumber)

@section('name', 'Xe taxi biển số '. $taxi->licenceNumber)

@section("content")
    <div class="row">
        <div class="col-md-6">
            <ul class="t-box">
                <li>Biển số : {{$taxi->licenceNumber}}</li>
                <li>Model : {{$taxi->model}}</li>
                <li>Số lượng ghế : {{$taxi->numberOfSeat}}</li>
                <li>Tình trạng :
                    @if($taxi->status == 1)
                        Hoạt động
                    @else
                        Ngừng hoạt động
                    @endif
                </li>
                <li>
                    Khu vực hoạt động : {{$location->nameLocation}}
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="t-box">
                <li>Mã tài xế : {{$driver->codeDriver}}</li>
                <li>Họ và tên : {{$driver->firstName.' '.$driver->lastName}}</li>
                <li>Địa chỉ : {{$driver->address}}</li>
                <li>Số điện thoại : {{$driver->phoneNumber}}</li>
            </ul>
        </div>
    </div>
@endsection