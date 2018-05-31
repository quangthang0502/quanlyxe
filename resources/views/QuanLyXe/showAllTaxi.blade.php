@extends('include.layout')

@section('title','Quản Lý Xe')

@section('name','Quản Lý Xe')

@section("content")
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Biển số</th>
                    <th>Model</th>
                    <th>Tài Xế</th>
                    <th>Khu Vực</th>
                    <th>Ca</th>
                    <th>Hành Động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $a)
                    <tr>
                        <td>{{$a['licenceNumber']}}</td>
                        <td>{{$a['model']}}</td>
                        <td>{{$a['name']}}</td>
                        <td>{{$a['khuVuc']}}</td>
                        <td>
                            @if($a['shift'] == 1)
                                Ban Ngày
                            @else
                                Ban Đêm
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-primary" href="{{route('TaxiDetal',$a['codeDriver'])}}">Xem</a>
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