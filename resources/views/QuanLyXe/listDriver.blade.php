@extends('include.layout')

@section('title','Danh sách tài xế')

@section('name','Danh sách tài xế')

@section("content")
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Mã tài xế:</th>
                    <th>Tên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Số CMND</th>
                    <th>Được điều xe</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($taiXe as $a)
                    <tr>
                        <td>{{$a->codeDriver}}</td>
                        <td>{{$a->firstName. ' '. $a->lastName}}</td>
                        <td>
                            @if($a->gender == 1)
                                Nam
                            @else
                                Nữ
                            @endif
                        </td>
                        <td>{{$a->phoneNumber}}</td>
                        <td>{{$a->cardNumber}}</td>
                        <td>
                            @if($a->active == true)
                                Đang trống
                            @else
                                Đã phân xe
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-primary" href="{{route('TaxiDetal',$a->codeDriver)}}">Xem</a>
                                <a class="btn btn-success">Sửa</a>
                                <a class="btn btn-danger">Xóa</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection