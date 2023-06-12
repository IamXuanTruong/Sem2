@extends('layout')
@section('content')
<div style="width: 80%;margin: 40px auto">
    @if (session('CheckoutData'))
        <div class="alert alert-success">
            <h4>Những góp ý và phản hồi đến từ khách hàng gần đây:</h4>
            <p>Họ và tên: {{ session('CheckoutData')['name'] }}</p>
            <p>Email: {{ session('CheckoutData')['email'] }}</p>
            <p>Nội dung: {{ session('CheckoutData')['address'] }}</p>
            <p>Nội dung: {{ session('CheckoutData')['phone'] }}</p>
            <p>Nội dung: {{ session('CheckoutData')['note'] }}</p>
        </div>
    @endif
</div>

    
@endsection