@extends('include.layout')

@section('title','Quản Lý Xe')

@section('name','Quản Lý Xe')

@section("content")
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{route('aSearch')}}" method="post" class="form-inline" style="margin-bottom: 30px">
                {{csrf_field()}}
                <label for="" class="mr mr-sm-2">Tìm kiếm</label>
                <input type="text" name="licenceNumber" placeholder="Nhập biển số xe" class="form-control md-2 mr-sm-2">
                <button type="submit" class="btn btn-primary md-2"> Tìm kiếm</button>
            </form>
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
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
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
                                <a class="btn btn-danger" href="{{
                                route('xoaPhanXe',[
                                'licenceNumber' => $a['licenceNumber'],
                                'codeDriver' => $a['codeDriver']
                                ])}}">Xóa</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$taxiTaiXe->appends(['sort' => 'id'])->links()}}
        </div>
    </div>
@endsection