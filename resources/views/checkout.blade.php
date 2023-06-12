@extends('layout')
@section('content')
    <div class="checkout" style="width: 80%;margin: 40px auto">
        <h4 style="text-align: center;font-family: serif;color: #cb851c">Monter Coffee</h4>
        <a
            href=""style="text-align: center;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;color:black;text-decoration: none">
            <h2>Thanh Toán</h2>
        </a>
        <div style="text-align: center;padding-bottom: 40px ">
            <img src="https://bizweb.dktcdn.net/100/451/095/themes/894906/assets/bg-after-title.png?1664360071876"
                alt="" style="width: 120px;text-align: center">
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="persional">
                    <h5><i class="fas fa-dice-one"></i> Thông Tin Cá Nhân</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="name" id="" placeholder="Nhập vào họ của bạn: "
                                style="width: 100%;margin-top: 15px;padding: 10px;border-radius: 10px;box-shadow: inset 0 0 3px rgba(0,0,0,0.8)"
                                value="{{ Auth::user()->name }}">
                        </div>

                        <div class="col-lg-12 mt-3">
                            <input type="text" name="email" id="" placeholder="Nhập vào email của bạn: "
                                style="width: 100%;margin-top: 15px;padding: 10px;border-radius: 10px;box-shadow: inset 0 0 3px rgba(0,0,0,0.8)"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="text" name="address" id="" placeholder="Ghi rõ địa chỉ nơi bạn ở: "
                                style="width: 100%;margin-top: 15px;padding: 10px;border-radius: 10px;box-shadow: inset 0 0 3px rgba(0,0,0,0.8)"
                                value="{{ Auth::user()->address }}">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="text" name="phone" id=""
                                placeholder="Nhập vào Số điện thoại của bạn:"
                                style="width: 100%;margin-top: 15px;padding: 10px;border-radius: 10px;box-shadow: inset 0 0 3px rgba(0,0,0,0.8)"
                                value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <textarea name="note" id="" cols="30" rows="10"
                                style="width: 100%;margin-top: 15px;padding: 10px;border-radius: 10px;box-shadow: inset 0 0 3px rgba(0,0,0,0.8)"
                                placeholder="Ghi Chú :"></textarea>
                        </div>
                    </div>
                </div>

                <div id="myDiv" style="display: none;padding-top: 20px">
                    <h5><i class="fas fa-dice-one"></i> Thanh toán bằng thẻ</h5>
                    <form action="">
                        <div class="mt-3">
                            <label for="" style="color: rgba(0,0,0,0.6);font-weight: 500">Credit Card
                                Number</label>
                            <input type="text" name="phone" id="" placeholder="0000 - 0000 - 0000 - 0000"
                                style="width: 100%;padding: 10px;border-radius: 10px;box-shadow: inset 0 0 3px rgba(0,0,0,0.8)">
                        </div>
                        <div class="row pt-3">
                            <div class="col-lg-6">
                                <label for="" style="color: rgba(0,0,0,0.6);font-weight: 500">Sercurity
                                    code</label>
                                <input type="password" name="phone" id="" placeholder="******"
                                    style="width: 100%;padding: 10px;border-radius: 10px;box-shadow: inset 0 0 3px rgba(0,0,0,0.8)">
                            </div>
                            <div class="col-lg-6">
                                <label for="" style="color: rgba(0,0,0,0.6);font-weight: 500">Expiration
                                    date</label>
                                <input type="date" name="phone" id="" placeholder="Số thẻ"
                                    style="width: 100%;padding: 10px;border-radius: 10px;box-shadow: inset 0 0 3px rgba(0,0,0,0.8)">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <h5><i class="fas fa-dice-one"></i> Đơn hàng của bạn</h5>

                <div class="order mt-4"
                    style="box-shadow: 1px 1px 2px 2px rgb(130, 125, 125); border: 1px solid rgba(0,0,0,0.2);padding: 15px">
                    <div class="d-flex"
                        style="justify-content: space-between;margin: 25px;border-bottom:1px solid rgba(0,0,0,0.3)">
                        <h5>Sản Phẩm</h5>
                        <h5>Tổng</h5>
                    </div>
                    @php
                        $total = 0;
                    @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php
                                $total += $details['price'] * $details['quantity'];
                            @endphp
                            <div class="d-flex"
                                style="justify-content: space-between;border-bottom:1px solid rgba(0,0,0,0.3);margin: 25px">
                                <h5>{{ $details['name'] }}* <span>{{ $details['quantity'] }}</span></h5>
                                <h5>{{ $details['price'] * $details['quantity'] }}$</h5>
                            </div>
                        @endforeach
                    @endif

                    <div class="d-flex" style="justify-content: space-between;margin: 25px">
                        <h5>Tạm Tính:</h5>
                        <h5>{{ $details['price'] * $details['quantity'] }}$</h5>
                    </div>
                    <div class="d-flex"
                        style="justify-content: space-between;border-bottom:1px solid rgba(0,0,0,0.3);margin: 25px">
                        <h5>Phí Vận Chuyển:</h5>
                        <h5>0 $</h5>
                    </div>
                    <div class="d-flex" style="justify-content: space-between;border-bottom:1px solid rgba(0,0,0,0.3)">
                        <h5>Tổng :</h5>
                        <h5>{{ $total }}$</h5>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-5 d-flex" style="justify-content: space-between">
            <h5>Chọn phương thức thanh toán</h5>
            <select name="" id="mySelect" style="padding: 10px">
                <option value="">Chọn phương thức</option>
                <option value="option1">Thanh toán khi nhận hàng </option>
                <option value="option2">Thanh toán bằng thẻ</option>
            </select>
        </div>
        <button style="width: 100%;margin: 40px auto;padding: 7px;background: red;border-radius: 10px" id="orderButton "
            type="submit">
            <h5 style="color: #fff">Đặt Hàng</h5>
        </button>

    </div>
@endsection
