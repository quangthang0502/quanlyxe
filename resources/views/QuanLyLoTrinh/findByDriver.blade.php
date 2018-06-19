@extends('include.layout')

@section('title','Quản lý lộ trình')

@section('name','Quản lý lộ trình')

@section('content')
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <form action="{{route('ThongKeLotrinh')}}" method="post" class="form-inline" style="margin-bottom: 30px">
                {{csrf_field()}}
                <label for="" class="mr mr-sm-2">Tìm kiếm</label>
                <input type="text" name="lastName" placeholder="Tên tài xế" class="form-control md-2 mr-sm-2">
                <button type="submit" class="btn btn-primary md-2"> Tìm kiếm</button>
            </form>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Tên tài xế</th>
                    <th>Tổng số chuyến đi</th>
                    <th>Tổng số Km</th>
                    <th>Số tiền kiếm được</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($result))
                    @foreach($result as $a)
                        <tr>
                            <td>{{$a['driver']->firstName.' '.$a['driver']->lastName}}</td>
                            <td>{{$a['count']}}</td>
                            <td>{{$a['totalKm']}} km</td>
                            <td>{{$a['totalMoney']}} Đồng</td>
                        </tr>
                    @endforeach
                @endif
                @if(isset($resultCount) && isset($resultKm) && isset($resultMoney))
                    <tr style="font-weight: bold; background-color: #e1e1e1">
                        <td>Tổng cộng </td>
                        <td>{{$resultCount}}</td>
                        <td>{{$resultKm}} Km</td>
                        <td>{{$resultMoney}} đồng</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{--{{$loTrinh->appends(['sort' => 'id'])->links()}}--}}
        </div>
    </div>
@endsection