@extends('include.layout')

@section('title','Tài xế '. $driver->firstName.' '.$driver->lastName)

@section('name', 'Thông tin tài xế '. $driver->firstName.' '.$driver->lastName)

@section("content")
    <div class="row">
        <div class="col-md-6">
            <h3 class="title">Thông tin tài xế</h3>
            <ul class="t-box">
                <li><span>Mã tài xế :</span> {{$driver->codeDriver}}</li>
                <li><span>Họ và tên :</span> {{$driver->firstName.' '.$driver->lastName}}</li>
                <li><span>Giới tính :</span>
                    @if($driver->gender == 1)
                        Nam
                        @else
                        Nữ
                    @endif
                </li>
                <li><span>Địa chỉ :</span> {{$driver->address}}</li>
                <li><span>Email :</span> {{$driver->email}}</li>
                <li><span>Số điện thoại :</span> {{$driver->phoneNumber}}</li>
                <li><span>Chứng minh nhân dân :</span> {{$driver->cardNumber}}</li>
                <li><span>Ngày sinh :</span> {{date('d-m-Y', strtotime($driver->birthday))}}</li>
                <li><span>Dân tộc :</span> {{$driver->danToc}}</li>
                <li><span>Tình trạng hôn nhân :</span> {{$driver->relationship}}</li>
                <li><span>Tôn giáo :</span> {{$driver->religion}}</li>
                <li><span>Trình độ học vấn :</span> {{$driver->educationalLevel}}</li>
                <li><span>Tiểu sử :</span> {{$driver->story}}</li>
                <li><span>Khác :</span> {{$driver->description}}</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h3 class="title">Thông tin xe được bàn giao</h3>
            <ul class="t-box">
                @if($taxi && $shift)
                <li><span>Biển số :</span> {{$taxi->licenceNumber}}</li>
                <li><span>Model :</span> {{$taxi->model}}</li>
                <li><span>Số lượng ghế :</span> {{$taxi->numberOfSeat}}</li>
                <li><span>Tình trạng :</span>
                    @if($taxi->status == 1)
                        Hoạt động
                    @else
                        Ngừng hoạt động
                    @endif
                </li>
                <li>
                    <span>Ca hoạt động :</span>
                    @if($shift == 1)
                        Ban Ngày
                    @else
                        Ban Đêm
                    @endif
                </li>
                <li>
                    <span>Khu vực hoạt động :</span> {{$location->nameLocation}}
                </li>
                @endif
            </ul>
        </div>
    </div>
@endsection