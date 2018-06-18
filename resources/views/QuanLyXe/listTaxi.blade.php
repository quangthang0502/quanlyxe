@extends('include.layout')

@section('title','Danh sách Taxi')

@section('name','Danh sách Taxi')

@section("content")
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Biển số:</th>
                    <th>Model</th>
                    <th>Số lượng ghế</th>
                    <th>Phân phối cho</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($taxi as $a)
                    <tr>
                        <td>{{$a->licenceNumber}}</td>
                        <td>{{$a->model}}</td>
                        <td>{{$a->numberOfSeat}}</td>
                        <td>
                            {{$a->status}} tài xế
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-success" href="{{route('capNhapTaxi',$a->licenceNumber)}}">Sửa</a>
                                <a class="btn btn-danger" href="{{route('xoaTaxi',$a->licenceNumber)}}">Xóa</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$taxi->appends(['sort' => 'id'])->links()}}
        </div>
    </div>
@endsection