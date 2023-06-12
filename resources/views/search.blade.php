@extends('layout')
@section('content')
    <div class="search" style="width: 80%;margin: 40px auto">
        <h4 style="text-align: center;font-family: serif;color: #cb851c">Monter Coffee</h4>
        <a
            href=""style="text-align: center;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;color:black;text-decoration: none">
            <h2>Sản Phẩm Bạn Đang Tìm</h2>
        </a>
        <div style="text-align: center">
            <img src="https://bizweb.dktcdn.net/100/451/095/themes/894906/assets/bg-after-title.png?1664360071876"
                alt="" style="width: 120px;text-align: center">
        </div>
        <div class="row pt-4">
            @foreach ($products as $product)
                <div class="col-lg-4 p-3">
                    <div class="card" style="width: 100%;border: 2px solid rgba(0, 0, 0, 0.2);">
                        <a href="{{ route('detail', ['id' => $product->id]) }}"><img src="{{ $product->image }}"
                                class="card-img-top" alt="..."
                                style="border-bottom: 1px solid rgba(0, 0, 0, 0.1);width: 100%;height: 330px;"></a>
                        <div class="card-body" style="width: 95%;margin: 0 auto">
                            <a href="{{ route('detail', ['id' => $product->id]) }}"
                                style="text-decoration: none;font-family: cursive;color: #cb851c">
                                <h5 class="card-title">{{ $product->name }}</h5>
                            </a>
                            <div style="color: yellow">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h6 style="color: chocolate;padding-top: 10px">Giá : {{ $product->price }}₫</h6>
                            <p class="card-text">Trạng Thái: {{ $product->status }}</p>
                            <div style="width: 100%;text-align: right">
                                <a href="{{ route('detail', ['id' => $product->id]) }}" class="btn btn-danger"><i
                                        class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-cart-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
