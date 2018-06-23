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
                <div style="float: right">
                    <button class="btn btn-info" onclick="exportToExcel()"><span class="fa fa-print"></span> In ra</button>
                </div>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            </table>
        </div>
    </div>
    <script>
        function buttonClick(a) {
            if (a == 0) {
                myUrl = '{{route('sieuThongKe',0)}}';
            } else {
                myUrl = '{{route('sieuThongKe',1)}}';
            }
            $.ajaxSetup({
                headers: {'X-CSRF-Token': '{{csrf_token()}}'}
            });
            $.ajax({
                type: 'GET',
                url: myUrl,
                success: function (result) {
                    $('#dataTable').html(result);
                }
            })
        }
        
        function exportToExcel() {
            $('#dataTable').tableExport({
                type:'excel',
                filename: 'Thống kê'
            });
        }

    </script>
@endsection

@section('foot')
    <script src="{{url('/node_modules/tableexport.jquery.plugin/libs/FileSaver/FileSaver.min.js')}}"></script>
    <script src="{{url('/node_modules/tableexport.jquery.plugin/libs/js-xlsx/xlsx.core.min.js')}}"></script>
    <script src="{{url('/node_modules/tableexport.jquery.plugin/tableExport.min.js')}}"></script>
@endsection