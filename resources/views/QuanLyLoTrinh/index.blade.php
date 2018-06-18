@extends('include.layout')

@section('title','Quản lý lộ trình')

@section('name','Quản lý lộ trình')

@section('content')
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Mã khách</th>
                    <th>SDT</th>
                    <th>Điểm đón</th>
                    <th>Điểm đến</th>
                    <th>Tài xế</th>
                    <th>Taxi</th>
                    <th>Quãng đường</th>
                    <th>Số tiền</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $a)
                    <tr>
                        <td>{{$a['customer']->codeCustomer}}</td>
                        <td>{{$a['customer']->phoneNumber}}</td>
                        <td>{{$a['loTrinh']->origin}}</td>
                        <td>{{$a['loTrinh']->destination}}</td>
                        <td>{{$a['driver']}}</td>
                        <td>{{$a['taxi']}}</td>
                        <td>{{$a['loTrinh']->numberOfKm}} Km</td>
                        <td>{{$a['loTrinh']->fee}} Đ</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-primary"
                                   href="{{route('showCustomer',$a['customer']->codeCustomer)}}">Xem</a>
                                <a class="btn btn-success" href="{{route('suaLoTrinh',$a['customer']->codeCustomer)}}">Sửa</a>
                                <a class="btn btn-danger"
                                   href="{{route('deleteCustomer',$a['customer']->codeCustomer)}}">Xóa</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$loTrinh->appends(['sort' => 'id'])->links()}}
        </div>
    </div>
@endsection