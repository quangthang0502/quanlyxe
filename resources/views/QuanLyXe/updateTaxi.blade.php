@extends('include.layout')

@section('title', 'Cập nhập xe mới')

@section('name', 'Cập nhập xe mới')

@section('content')
    <form action="{{route('capNhapTaxi',$taxi->licenceNumber)}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach

        <div class="form-group">
            <label>Biển số</label>
            <input type="text" name="licenceNumber" class="form-control" id="licenceNumber" value="{{$taxi->licenceNumber}}">
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" id="model" value="{{$taxi->model}}">
        </div>
        <div class="form-group">
            <label for="numberOfSeat">Số lượng ghế:</label>
            <input type="text" name="numberOfSeat" class="form-control" id="numberOfSeat" value="{{$taxi->numberOfSeat}}">
        </div>

        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection