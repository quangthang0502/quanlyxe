@extends('include.layout')

@section('title','Danh sách Taxi sửa chữa')

@section('name','Danh sách Taxi sửa chữa')

@section("content")
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <form action="{{route('searSuaChua')}}" method="get" class="form-inline" style="margin-bottom: 30px">
                {{csrf_field()}}
                <label for="" class="mr mr-sm-2">Tìm kiếm</label>
                <input type="text" name="licenceNumber" placeholder="Nhập biển số"
                       @if(isset($licenceNumber)) value="{{$licenceNumber}}" @endif
                       class="form-control md-2 mr-sm-2">
                <input type="text" name="model" placeholder="Loại xe"
                       @if(isset($model)) value="{{$model}}" @endif
                       class="form-control md-2 mr-sm-2">
                <button type="submit" class="btn btn-primary md-2"> Tìm kiếm</button>
            </form>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Biển số:</th>
                    <th>Model</th>
                    <th>Lý do</th>
                    <th>Ngày sửa chữa</th>
                    <th>Chi tiết</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $a)
                    <tr>
                        <td>{{$a['licenceNumber']}}</td>
                        <td>{{$a['model']}}</td>
                        <td>{{$a['reason']}}</td>
                        <td>{{date('d-m-Y', strtotime($a['date']))}}</td>
                        <td>{{$a['note']}}</td>
                        <td>
                            <div class="button-group">
                                <a href="{{route('editSuaChua', $a['id'])}}" class="btn btn-info">Sửa</a>
                                <a href="{{route('xoaSuaChua', $a['id'])}}" class="btn btn-danger">Xóa</a>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if($suaChua != null)
                @if(!isset($licenceNumber) && !isset($model))
                    {{$suaChua->appends(['sort' => 'id'])->links()}}
                @else
                    {{$suaChua->appends([
                    'sort' => 'id',
                    '_token' => csrf_token(),
                    'licenceNumber' => $licenceNumber,
                    'model' => $model,
                ])->links()}}
                @endif
            @endif
        </div>
    </div>
@endsection