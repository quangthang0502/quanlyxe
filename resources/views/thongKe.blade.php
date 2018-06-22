@extends('include.layout')

@section('title','Thống kê tổng hợp')

@section('name','Thống kê tổng hợp')

@section('content')
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <div class="button-group" style="margin-bottom: 20px">
                <button class="btn btn-info" onclick="buttonClick(0);">Theo tháng</button>
                <button class="btn btn-info" onclick="buttonClick(1);">Theo năm</button>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            </table>
        </div>
    </div>
    <script>
        function buttonClick(a) {
            if (a == 0){
                myUrl = '{{route('sieuThongKe',0)}}';
            }else {
                myUrl = '{{route('sieuThongKe',1)}}';
            }
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : '{{csrf_token()}}' }
            });
            $.ajax({
                type:'GET',
                url: myUrl,
                success: function (result) {
                    $('#dataTable').html(result);
                }
            })
        }
    </script>
@endsection