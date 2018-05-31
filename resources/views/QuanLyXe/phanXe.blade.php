@extends('include.layout')

@section('title', 'Phân xe')

@section('name', 'Phân xe')

@section('content')
    @foreach($errors->all() as $message)
        <div class="alert alert-danger">{{$message}}</div>
    @endforeach
    <form action="{{route('phanXe')}}" method="post" class="form-inline" style="padding: 10px; margin-top: 10px">
        {{csrf_field()}}
        <label for="" class="mr-sm-2">Chọn xe:</label>
        <select name="licenceNumber" id="" class="form-control mb-2 mr-sm-2">
            @foreach($taxi as $t)
                <option value="{{$t->licenceNumber}}">{{$t->licenceNumber}}</option>
            @endforeach
        </select>
        <label for="" class="mr-sm-2">Chọn tài xế:</label>
        <select name="codeDriver" id="" class="form-control mb-2 mr-sm-2">
            @foreach($driver as $d)
                <option value="{{$d->codeDriver}}">{{$d->firstName.' '.$d->lastName}}</option>
            @endforeach
        </select>
        <label for="" class="mr-sm-2">Chọn khu vực:</label>
        <select name="codeLocation" id="" class="form-control mb-2 mr-sm-2">
            @foreach($location as $l)
                <option value="{{$l->codeLocation}}">{{$l->nameLocation}}</option>
            @endforeach
        </select>
        <label for="" class="mr-sm-2">Chọn ca:</label>
        <select name="shift" id="shift" class="form-control mb-2 mr-sm-2">
            <option value="1">Ban ngày</option>
            <option value="2">Ban đêm</option>
        </select>
        <button type="submit" class="btn btn-primary mb-2">Phân xe</button>
    </form>
@endsection