<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon"
        href="https://scontent.fhan2-5.fna.fbcdn.net/v/t39.30808-6/349728058_545265077755915_3344809737006389410_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=AFRQj_hf0-wAX_FlFhi&_nc_ht=scontent.fhan2-5.fna&oh=00_AfD8JWDwmBz81e0WnfhSYdZpzVPhv8nPnnpTto9888nFsQ&oe=647E64FB">
    <title>Monster Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <header>
        <div class="header1">
            <div class="logo1">
                <a href="{{route('homepage')}}"> <img
                        src="https://www.beeart.vn/uploads/file/images/blog/logo-quan-ca-phe/thiet-ke-logo-quan-ca-phe-bee-art-06.jpg"
                        alt=""></a>
            </div>
            <div class="menu1">
                <a href="{{ route('homepage') }}" style="color: chocolate ">Trang Chủ</a>
                <a href="{{ route('Gioithieu') }}">Giới Thiệu</a>
                <a href="{{ route('product') }}">Sản Phẩm</a>
                <a href="{{ route('blog') }}">Blog</a>
                <a href="{{ route('Lienhe') }}">Liên Hệ</a>

            </div>
            <div class="t"></div>
            <div class="icon-menu">
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"><i class="fas fa-search"></i></button>
                    <div id="myDropdown" class="dropdown-content">
                        <form action="{{ route('search') }}" method="POST">
                            @csrf
                            <input type="text" placeholder="Search.." id="myInput" name="search">
                        </form>
                    </div>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn btn-dark" data-toggle="dropdown">
                        <i class="fas fa-shopping-basket" aria-hidden="true"></i><span
                            class="badge badge-pill badge-danger"
                            style="color: red">{{ count((array) session('cart')) }}</span>
                    </button>
                    <div class="dropdown-menu p-3" style="width: 320px;margin-top:10px">
                        <div class="total-header-section">
                            @php $total = 0 @endphp
                            @foreach ((array) session('cart') as $id => $details)
                                @php $total += $details['price']*$details['quantity'] @endphp
                            @endforeach

                        </div>
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <div class="row cart-detail p-2"
                                    style="border-bottom: 1px solid rgba(0, 0, 0, 0.4);width: 100%;height: 80px;">
                                    <div class="col-lg-3 cart-detail-img">
                                        <img src="{{ $details['image'] }}" alt="" width="100%" height="50px">
                                    </div>
                                    <div class="col-lg-9 cart-detail-product">
                                        <div class="d-flex" style="justify-content: space-between">
                                            <p>{{ $details['name'] }}</p>
                                            <p class="price text-info">Giá: {{ $details['price'] }}$</p>
                                        </div>

                                        <p class="count">Số Lượng: {{ $details['quantity'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="total-section col-lg-12 pt-3">
                            <p>Tổng Tiền: <span class="text-info"> {{ $total }}$</span></p>
                        </div>
                        <div class="checkout text-center">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Xem Giỏ Hàng</a>
                        </div>
                    </div>
                </div>
                <nav>
                    @if (Auth::check())
                        <a href="{{ route('signout') }}">
                            <img src="{{ asset('https://lh3.googleusercontent.com/a/AAcHTtdGwRMvHPrsnz2u3yY5jBjkCHPDId6lo9xGjmMc=s360-c-no') }}"
                                alt="" style="width: 35px;height: 35px;border-radius: 30px">
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            <a href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                        </a>
                    @endif
                </nav>
            </div>
            <div class="logout">
                <a href="{{ route('signout') }}"><i class="fas fa-sign-out-alt" style="color: #fff"></i></a>
            </div>
        </div>

    </header>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
    @yield('scripts')

    <footer>
        <div class="footer">
            <div class="past1">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>ĐĂNG KÝ NHẬN KHUYẾN MÃI</h2>
                        <p>Đừng bỏ lỡ những sản phẩm và chương trinh khuyến mãi hấp dẫn</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-push">
                            <input type="text" name="" id=""
                                style="width: 80%;padding: 10px;border-radius: 10px" placeholder="Email cua ban:....">
                            <button
                                style="padding: 10px;border-radius: 10px;color: #fff;background: rgba(180, 101, 41, 0.812)">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="past2">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="https://bizweb.dktcdn.net/100/451/095/themes/894906/assets/logo.png?1676280956426"
                            alt="">
                        <p
                            style="padding-top: 15px;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                            Monster Coffee mong rằng chúng tôi luôn mang đến cho khách hàng những trải nghiệm tốt nhất,
                            tạo ra
                            những
                            khoảnh khắc khó quên khi đến với Monster.
                        </p>
                        <div class="icon-ft" style="font-size: 20px;color: rgb(232, 161, 67) ">
                            <i class="fab fa-twitter" style="padding: 5px;"></i>
                            <i class="fab fa-facebook"style="padding: 5px;"></i>
                            <i class="fab fa-youtube"style="padding: 5px;"></i>
                            <i class="fas fa-envelope"style="padding: 5px;"></i>
                            <i class="fab fa-tiktok"style="padding: 5px;"></i>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <h6 style="color: rgb(232, 161, 67)">Hệ Thống Cửa Hàng</h6>
                        <p><i class="fas fa-map-marker-alt" style="color: rgb(232, 161, 67)"></i> CN1: Tầng 6 toà nhà
                            Ladeco, 266 Đội Cấn, phường Liễu
                            Giai, Hà Nội, Việt Nam</p>
                        <p><i class="fas fa-map-marker-alt" style="color: rgb(232, 161, 67)"></i> CN2: Toà nhà Lữ Gia,
                            70 Lữ Gia, phường 15, quận 11, TP.
                            HCM, Việt Nam</p>
                        <h6 style="color: rgb(232, 161, 67)">Liên Hệ</h6>
                        <p><i class="fas fa-phone-alt" style="color: rgb(232, 161, 67)"></i> Hotline đặt hàng:
                            19006750
                        </p>
                        <p><i class="fas fa-envelope" style="color: rgb(232, 161, 67)"></i> Email: support@sapo.vn</p>
                        <p>Thứ 2 - Thứ 6: 7am - 10pm</p>
                        <p>Thứ 7 - Chủ nhật: 8am - 9pm</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

<style>
    /* header */
    header {
        width: 100%;
        background-image: url(http://bizweb.dktcdn.net/100/451/095/themes/894906/assets/background_brea.jpg?1664360071876);
    }

    .header1 {
        width: 80%;
        margin: 0 auto;
        display: flex;
    }

    .logo1 {
        width: 25%;
    }

    .logo1 img {
        width: 65%;
        height: 150px;
    }

    .menu1 {
        width: 45%;
        display: flex;
        text-align: left;
        justify-content: space-between;
        font-size: 20px;
        padding-top: 55px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .menu1 a {
        text-decoration: none;
        color: #fff;
    }

    .t {
        width: 7%;
    }

    .icon-menu {
        padding-top: 50px;
        width: 13%;
        display: flex;
        justify-content: space-between;
        font-size: 23px;
    }

    .logout {
        width: 10%;
        padding-top: 50px;
        font-size: 27px;
        text-align: right;
    }

    .icon-menu a {
        color: #fff;
    }

    a:hover {
        color: chocolate;
    }

    /* header */
    .item-product {
        padding: 5px;
        width: 100%;
        height: 130px;
        background: #fff;
        border-radius: 10px;
        margin: 17px;
    }

    .img-product {
        width: 100%;
        height: 150px;
    }

    .img-product img {
        width: 100%;
        padding: 5px;
        height: 90px;
    }

    .body {
        width: 100%;
        background-image: url(https://bizweb.dktcdn.net/100/451/095/themes/894906/assets/bg-menu-today2.png?1664360071876);
        background-size: 100%;
        height: 100%;
    }

    .banner {
        width: 75%;
        margin: 0 auto;
    }

    .content {
        width: 80%;
        margin: 50px auto;
        padding: 15px;
    }

    /* footter */
    footer {
        width: 100%;
        background: black;
        color: white;
        padding: 40px;
        margin-top: 100px;
    }

    .footer {
        width: 80%;
        margin: 0 auto;

    }

    /* view */
    .view {
        width: 80%;
        margin: 30px auto;
    }

    .image1,
    image2,
    image3,
    image4 {
        width: 100%;
    }

    .image1 img {
        width: 100%;
    }

    .image2 img {
        width: 100%;
    }

    .image3 img {
        width: 100%;
    }

    .image4 img {
        width: 100%;
    }

    /* Evaluate */
    .Evaluate {
        width: 100%;
        background: #fcf3ec;
        padding: 50px;
    }

    .Evaluate-item {
        width: 80%;
        margin: 50px auto;
        display: flex;
    }

    .show-evaluate {
        margin: 10px;
    }

    /* time on */
    .time-on {
        width: 100%;
        background-image: url(https://bizweb.dktcdn.net/100/451/095/themes/894906/assets/bg-thoi-gian-hoat-dong.png?1664360071876);
        background-size: 100%;
        background-repeat: no-repeat
    }

    .text-time {
        width: 80%;
        margin: 0px auto;
        height: 820px;
        padding: 50px;
    }

    .on-time {
        width: 60%;
        height: 600px;
        background-image: url(https://bizweb.dktcdn.net/100/451/095/themes/894906/assets/bg-inner-thoi-gian-hoat-dong.png?1664360071876);
        background-size: 100%;
        background-repeat: no-repeat;
        padding: 50px;
    }

    .ship-submit:hover a {
        border: 2px solid black !important;
    }

    .ship {
        width: 50%;
        margin: 0 auto;
    }

    /*  */
    .dropbtn {
        color: white;
        font-size: 25px;
        border: none;
        cursor: pointer;
        background: rgba(0, 0, 0, 0.4)
    }

    #myInput {
        box-sizing: border-box;
        background-image: url('searchicon.png');
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    #myInput:focus {
        outline: 3px solid #ddd;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        min-width: 230px;
        border: 1px solid #ddd;
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .show {
        display: block;
    }
</style>
<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>
<script>
    document.getElementById('mySelect').addEventListener('change', function() {
      var selectedValue = this.value;
      var myDiv = document.getElementById('myDiv');
    
      if (selectedValue === 'option2') {
        myDiv.style.display = 'block';
      } else {
        myDiv.style.display = 'none';
      }
    });
    </script>
    
</html>
