@extends('include.layout')

@section('title','Tài xế '. $driver->firstName.' '.$driver->lastName)

@section('name', 'Thông tin tài xế '. $driver->firstName.' '.$driver->lastName)

@section("content")
    <div class="row">
        <div class="col-md-6">
            <ul class="t-box">
                <li>Mã tài xế : {{$driver->codeDriver}}</li>
                <li>Họ và tên : {{$driver->firstName.' '.$driver->lastName}}</li>
                <li>Giới tính :
                    @if($driver->gender == 1)
                        Nam
                        @else
                        Nữ
                    @endif
                </li>
                <li>Địa chỉ : {{$driver->address}}</li>
                <li>Email : {{$driver->email}}</li>
                <li>Số điện thoại : {{$driver->phoneNumber}}</li>
                <li>Chứng minh nhân dân : {{$driver->cardNumber}}</li>
                <li>Ngày sinh : {{date('d-m-Y', strtotime($driver->birthday))}}</li>
                <li>Dân tộc : {{$driver->danToc}}</li>
                <li>Tình trạng hôn nhân : {{$driver->relationship}}</li>
                <li>Tôn giáo : {{$driver->religion}}</li>
                <li>Trình độ học vấn : {{$driver->educationalLevel}}</li>
                <li>Tiểu sử : {{$driver->story}}</li>
                <li>Khác : {{$driver->description}}</li>
            </ul>
        </div>
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
                    Ca hoạt động :
                </li>
                <li>
                    Khu vực hoạt động : {{$location->nameLocation}}
                </li>
            </ul>
        </div>
    </div>
@endsection