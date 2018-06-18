@extends('include.layout')

@section('title','Danh sách Taxi')

@section('name','Danh sách Taxi')

@section("content")
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <form action="{{route('tSearch')}}" method="post" class="form-inline" style="margin-bottom: 30px">
                {{csrf_field()}}
                <label for="" class="mr mr-sm-2">Tìm kiếm</label>
                <input type="text" name="licenceNumber" placeholder="Nhập biển số" class="form-control md-2 mr-sm-2">
                <input type="text" name="model" placeholder="Loại xe" class="form-control md-2 mr-sm-2">
                <select name="status" id="" class="form-control md-2 mr-sm-2">
                    <option selected value="">Tình trạng xe</option>
                    <option value="1">Còn trống</option>
                    <option value="2">Đã full</option>
                </select>
                <button type="submit" class="btn btn-primary md-2"> Tìm kiếm</button>
            </form>
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