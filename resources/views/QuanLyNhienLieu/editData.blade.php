@extends('include.layout')

@section('title', 'Sửa phếu '. $phieu->id)

@section('name', 'Sửa phếu '. $phieu->id)

@section('content')
    <form action="{{route('suaPhieu', $phieu->id)}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach

        <div class="form-group">
            <label for="time">Thời gian:</label>
            <input type="datetime-local" name="time" class="form-control" id="time" value="{{date('Y-m-d\TH:i:s', strtotime($phieu->time))}}">
        </div>
        <div class="form-group">
            <label for="numberGasoline">Số lượng xăng (Lít):</label>
            <input type="text" name="numberGasoline" class="form-control" id="numberGasoline" value="{{$phieu->numberGasoline}}">
        </div>
        <div class="form-group">
            <label for="numberOil">Số lượng dầu (Lít):</label>
            <input type="text" name="numberOil" class="form-control" id="numberOil" value="{{$phieu->numberOil}}">
        </div>
        <div class="form-group">
            <label for="codeDriver">Tài xế:</label>
            <select name="codeDriver" id="codeDriver" class="form-control">
                @foreach($result as $a)
                    <option value="{{$a['codeDriver']}}" @if($phieu->codeDriver == $a['codeDriver']) selected @endif>{{$a['name'].' - '.$a['licenceNumber']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="codeLocation">Địa điểm tiếp nhiên liệu:</label>
            <select name="codeLocation" id="codeLocation" class="form-control">
                @foreach($location as $b)
                    <option value="{{$b->codeLocation}}" @if($b->codeLocation == $phieu->codeLocation) selected @endif>{{$b->addressInputGasoline}}</option>
                @endforeach
            </select>
            <input type="hidden" name="licenceNumber" value="{{$a['licenceNumber']}}">
        </div>

        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection