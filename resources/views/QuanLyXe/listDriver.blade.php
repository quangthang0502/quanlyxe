@extends('include.layout')

@section('title','Danh sách tài xế')

@section('name','Danh sách tài xế')

@section("content")
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <form action="{{route('dSearch')}}" method="post" class="form-inline" style="margin-bottom: 30px">
                {{csrf_field()}}
                <label for="" class="mr mr-sm-2">Tìm kiếm</label>
                <input type="text" name="codeDriver" placeholder="Nhập mã tài xế" class="form-control md-2 mr-sm-2">
                <input type="text" name="lastName" placeholder="Tên tài xế" class="form-control md-2 mr-sm-2">
                <select name="active" id="" class="form-control md-2 mr-sm-2">
                    <option selected value="">Tình trạng xe</option>
                    <option value="0">Đã phân xe</option>
                    <option value="1">Đang trống</option>
                </select>
                <button type="submit" class="btn btn-primary md-2"> Tìm kiếm</button>
            </form>
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
                                <a class="btn btn-success" href="{{route('capNhapTaiXe',$a->codeDriver)}}">Sửa</a>
                                <a class="btn btn-danger" href="{{route('xoaTaiXe',$a->codeDriver)}}">Xóa</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$taiXe->appends(['sort' => 'id'])->links()}}

        </div>
    </div>
@endsection