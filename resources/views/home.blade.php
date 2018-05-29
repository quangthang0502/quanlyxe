@extends('include.layout')

@section('title','Trang quản lý')

@section('content')
    <section>
        <div class="row">
            <div class="col-md-2 left-bar">
                <ul>
                    @if(isAdmin())
                        <li class="active"><a href="">Quan lý người dùng</a></li>
                    @endif
                    @if(isQuanLyNhienLieu())
                        <li class="active"><a href="">Quan lý nhiên liệu</a></li>
                    @endif
                    @if(isQuanLyXe())
                        <li class="active"><a href="">Quan lý xe</a></li>
                    @endif
                    @if(isTrucBan())
                        <li class="active"><a href="">Quan lý lộ trình</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-md-10 right-bar">
                <table></table>
            </div>
        </div>
    </section>
@endsection