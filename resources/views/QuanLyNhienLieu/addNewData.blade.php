@extends('include.layout')

@section('title', 'Phiếu tiếp nhiên liệu mới')

@section('name', 'Phiếu tiếp nhiên liệu mới')

@section('content')
    <form action="{{route('nhapNhienLieu')}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach

        <div class="form-group">
            <label for="time">Thời gian:</label>
            <input type="datetime-local" name="time" class="form-control" id="time">
        </div>
        <div class="form-group">
            <label for="numberGasoline">Số lượng xăng (Lít):</label>
            <input type="text" name="numberGasoline" class="form-control" id="numberGasoline">
        </div>
        <div class="form-group">
            <label for="numberOil">Số lượng dầu (Lít):</label>
            <input type="text" name="numberOil" class="form-control" id="numberOil">
        </div>
        <div class="form-group">
            <label for="codeDriver">Tài xế:</label>
            <select name="codeDriver" id="codeDriver" class="form-control">
                @foreach($result as $a)
                    <option value="{{$a['codeDriver']}}">{{$a['name'].' - '.$a['licenceNumber']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="codeLocation">Địa điểm tiếp nhiên liệu:</label>
            <select name="codeLocation" id="codeLocation" class="form-control">
                @foreach($location as $b)
                    <option value="{{$b->codeLocation}}">{{$b->addressInputGasoline}}</option>
                @endforeach
            </select>
            <input type="hidden" name="licenceNumber" value="{{$a['licenceNumber']}}">
        </div>

        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection