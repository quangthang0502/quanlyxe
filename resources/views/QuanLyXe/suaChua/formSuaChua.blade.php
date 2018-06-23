@extends('include.layout')

@section('title', 'Sửa chữa xe')

@section('name', 'Sửa chữa xe')

@section('content')
    <form
            @if(isset($suaChua))
            action="{{route('editSuaChua', $suaChua->id)}}"
            @else
            action="{{route('themSuaChua')}}"
            @endif
            method="post" style="padding: 5px">
        {{csrf_field()}}
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{$message}}</div>
        @endforeach

        <div class="form-group">
            <label>Chọn xe</label>
            @if(isset($suaChua))
                <input type="text" name="licenceNumber" class="form-control" value="@if(isset($suaChua)){{$suaChua->licenceNumber}}@endif" readonly>
            @else
                <select name="licenceNumber" class="form-control" id="">
                    @foreach($taxi as $a)
                        <option value="{{$a->licenceNumber}}">{{$a->licenceNumber}}</option>
                    @endforeach
                </select>
            @endif

        </div>
        <div class="form-group">
            <label for="reason">Lý do sửa chữa:</label>
            <input type="text" name="reason" class="form-control" id="reason"
                   value="@if(isset($suaChua)){{$suaChua->reason}}@endif">
        </div>
        <div class="form-group">
            <label for="date">Ngày sửa chữa:</label>
            <input type="date" name="date" class="form-control" id="date"
                   value="@if(isset($suaChua)){{$suaChua->date}}@endif">
        </div>

        <div class="form-group">
            <label for="note">Chi tiết</label>
            <textarea name="note" id="" class="form-control" cols="30"
                      rows="10">@if(isset($suaChua)){{$suaChua->note}}@endif</textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhập</button>
    </form>
@endsection