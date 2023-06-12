@extends('layout')
@section('content')
<div class="dashboard" style="width: 80%;margin: 40px auto">
    <h3>Xin chào  {{ Auth::user()->name }}</h3>
    <h3>Chào mừng bạn đến với Monster Coffee</h3>
    <h3>Click Vô đây để cùng xem sản phẩm nào</h3>
    <div class="d-flex">
        <i class="far fa-hand-point-right" style="padding: 10px;font-size: 20px"></i>
        <a href="{{route('homepage')}}" class="btn btn-outline-danger" style="padding: 10px">Click here</a>
        <i class="far fa-hand-point-left" style="padding: 10px;font-size: 20px"></i>
    </div>
</div>



@endsection
