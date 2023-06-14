@extends('layout')
@section('content')
    <div class=" d-flex pt-5" style="width: 75%; margin: 0 auto">
        <div class="row">
            <div class="col-lg-5">
                <div class="">
                    <div class="p-2">
                        <i class="fas fa-map-pin"></i>
                        <a href="" style="text-decoration: none"><span class=""> 268 Cầu, Giấy, Hà Nội</span></a>
                    </div>
                    <div class="p-2">
                        <i class="fas fa-phone-square-alt"></i>
                        <a href="" style="text-decoration: none;"><span class="">0912117494</span></a>
                    </div>
                    <div class="p-2 pb-4">
                        <i class="fas fa-envelope-square"></i>
                        <a href="" style="text-decoration: none"><span
                            class="">dualeotheme@gmail.com</span></a>
                    </div>
                </div>
                <form action="{{ route('Lienhe') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Họ và tên" class="w-100 p-2 mt-3 mb-2"
                        style="border-radius: 20px" value="{{ Auth::user()->name }}">
                    <input type="email" name="email" placeholder="Email" class="w-100 p-2 mt-3 mb-2"
                        style="border-radius: 20px" value="{{ Auth::user()->email }}">
                    <textarea name="message" cols="30" rows="10" class="w-100 p-2 mt-3 mb-2" style="border-radius: 10px"
                        placeholder="Nội Dung:"></textarea>
                    <button class="btn btn-outline-danger mt-3 p-2" type="submit" style="border-radius: 20px">Gửi liên
                        hệ</button>
                </form>
            </div>
            <div class="col-lg-7">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31454.155498034033!2d105.48055066391382!3d9.785566426886277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0eebe4f395001%3A0xf867dac137e74438!2zVuG7iyBUcnVuZywgVHAuIFbhu4sgVGhhbmgsIEjhuq11IEdpYW5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1684815573279!5m2!1svi!2s"
                    width="650" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <div style="width: 80%;margin: 40px auto">
        @if (session('contactData'))
            <div class="alert alert-success">
                <h4>Những góp ý và phản hồi đến từ khách hàng gần đây:</h4>
                @foreach (session('contactData') as $key => $value)
                    <p>{{ $key }}: {{ $value }}</p>
                @endforeach
            </div>
        @endif


    </div>
@endsection
