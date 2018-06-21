@extends('include.layout')

@section('title','Thống kê nhiên liệu')

@section('name','Thống kê nhiên liệu')

@section('content')
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Tên tài xế</th>
                    <th>Số lượng xăng</th>
                    <th>Số lượng dầu</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $a)
                    <tr>
                        <td>{{$a['name']}}</td>
                        <td>{{$a['gas']}}</td>
                        <td>{{$a['oil']}}</td>
                    </tr>
                @endforeach
                <tr style="font-weight: bold; background-color: #e1e1e1">
                    <td>Tổng</td>
                    <td>{{$totalGas}}</td>
                    <td>{{$totalOil}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection