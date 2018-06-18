@extends('include.layout')

@section('title','Admin')

@section('name','Admin')

@section('content')
    <div class="card-body">
        <div class="table-responsive">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger">{{$message}}</div>
            @endforeach
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Chức vụ</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->name}}</td>
                        <td>{{$a->username}}</td>
                        <td>{{$a->email}}</td>
                        <td>
                            @if($a->active == 1)
                                Hoạt động
                            @else
                                Chặn
                            @endif
                        </td>
                        <td>
                            @if($a->level == 1)
                                Quản lý nhiên liệu
                            @elseif($a->level == 2)
                                Quản lý xe
                            @elseif($a->level ==3)
                                Quản lý lộ trình
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                @if($a->active == 1)
                                    <a class="btn btn-warning" href="{{route('chanUser',$a->id)}}">Chặn</a>
                                @else
                                    <a class="btn btn-primary" href="{{route('moUser',$a->id)}}">Mở</a>
                                @endif

                                <a class="btn btn-success" href="{{route('adminEditUser',$a->id)}}">Sửa</a>
                                <a class="btn btn-danger" href="{{route('adminDelUser', $a->id)}}">Xóa</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$user->appends(['sort' => 'id'])->links()}}
        </div>
    </div>
@endsection