@extends('include.layout')

@section('title', 'Thêm xe mới')

@section('name', 'Thêm xe mới')

@section('content')
    <form action="{{route('formNewTaxi')}}" method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach

        <div class="form-group">
            <label>Biển số</label>
            <input type="text" name="licenceNumber" class="form-control" id="licenceNumber">
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" id="model">
        </div>
        <div class="form-group">
            <label for="numberOfSeat">Số lượng ghế:</label>
            <input type="text" name="numberOfSeat" class="form-control" id="numberOfSeat">
        </div>

        <div class="form-group">
            <label for="frameNumber">Số khung</label>
            <input type="text" name="frameNumber" class="form-control" id="frameNumber">
        </div>
        <div class="form-group">
            <label for="machineNumber">Số máy:</label>
            <input type="text" name="machineNumber" class="form-control" id="machineNumber">
        </div>

        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection