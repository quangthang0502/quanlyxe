@extends('include.layout')

@section('title','Quản lý nhiên liệu')

@section('name','Quản lý nhiên liệu')

@section('content')
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Thời gian</th>
                    <th>Số lượng xăng</th>
                    <th>Số lượng dầu</th>
                    <th>Tên tài xế</th>
                    <th>Biển số xe</th>
                    <th>Khu vực</th>
                    <th>Địa chỉ</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $a)
                    <tr>
                        <td>{{$a['id']}}</td>
                        <td>{{date('G:i d/m/Y', strtotime($a['time']))}}</td>
                        <td>{{$a['numberGasoline']}} Lít</td>
                        <td>{{$a['numberOil']}} Lít</td>
                        <td>{{$a['driverName']}}</td>
                        <td>{{$a['licenceNumber']}}</td>
                        <td>{{$a['nameLocation']}}</td>
                        <td>{{$a['address']}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-success" href="{{route('suaPhieu',$a['id'])}}">Sửa</a>
                                <a class="btn btn-danger" href="{{route('xoaPhieu',$a['id'])}}">Xóa</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection