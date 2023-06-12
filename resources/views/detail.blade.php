@extends('layout')
@section('content')
    <main style="background: rgb(246, 240, 235);font-family: Verdana, Geneva, Tahoma, sans-serif">
        <div class="detail" style="width: 80%; margin: 0px auto">
            <div class="row p-5">
                <div class="col-lg-6">
                    <div class="mt-2" style="width: 100%;height: 500px;">
                        <div class="carousel-container position-relative row">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-slide-number="0">
                                        <img src="{{ $products->image }}" class="d-block w-100" alt="..."
                                            data-remote="https://source.unsplash.com/Pn6iimgM-wo/" data-type="image"
                                            data-toggle="lightbox" data-gallery="example-gallery" style="height: 600px">
                                    </div>
                                    <div class="carousel-item" data-slide-number="1">
                                        <img src="{{ $products->image1 }}" class="d-block w-100" alt="..."
                                            data-remote="https://source.unsplash.com/tXqVe7oO-go/" data-type="image"
                                            data-toggle="lightbox" data-gallery="example-gallery" style="height: 600px">
                                    </div>
                                    <div class="carousel-item" data-slide-number="2">
                                        <img src="{{ $products->image2 }}" class="d-block w-100" alt="..."
                                            data-remote="https://source.unsplash.com/qlYQb7B9vog/" data-type="image"
                                            data-toggle="lightbox" data-gallery="example-gallery" style="height: 600px">
                                    </div>
                                    <div class="carousel-item" data-slide-number="3">
                                        <img src="{{ $products->image3 }}" class="d-block w-100" alt="..."
                                            data-remote="https://source.unsplash.com/QfEfkWk1Uhk/" data-type="image"
                                            data-toggle="lightbox" data-gallery="example-gallery" style="height: 600px">
                                    </div>
                                </div>
                            </div>
                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner ">
                                    <div class="carousel-item active">
                                        <div class="row mx-0">
                                            <div id="carousel-selector-0" class="thumb col-4 col-sm-4 px-1 py-2 selected"
                                                data-target="#myCarousel" data-slide-to="1" style="height: 100px;">
                                                <img src="{{ $products->image1 }}" class="img-fluid" alt="..."
                                                    style="height: 100px;width: 100%;">
                                            </div>

                                            <div id="carousel-selector-2" class="thumb col-4 col-sm-4 px-1 py-2"
                                                data-target="#myCarousel" data-slide-to="2" style="height: 100px;">
                                                <img src="{{ $products->image2 }}" class="img-fluid" alt="..."
                                                    style="height: 100px;width: 100%;">
                                            </div>
                                            <div id="carousel-selector-3" class="thumb col-4 col-sm-4 px-1 py-2"
                                                data-target="#myCarousel" data-slide-to="3" style="height: 100px;">
                                                <img src="{{ $products->image3 }}" class="img-fluid" alt="..."
                                                    style="height: 100px;width: 100%;">
                                            </div>
                                            <div class="col-2 px-1 py-2"></div>
                                            <div class="col-2 px-1 py-2"></div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div style="border-bottom: 2px solid chocolate; padding-bottom: 20px">
                        <h3>{{ $products->name }}</h3>
                        <div class="danhgia pt-2" style="color: yellow">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="card-text p-1" style="font-weight: 500">Trạng Thái: {{ $products->status }}</p>
                        <div class="price d-flex pt-2">
                            <p class="p-1">Giá :</p>
                            <h4 style="color: chocolate">{{ $products->price }}₫</h4>
                        </div>
                        <div class="p-1">
                            <p>Ghi Chú :</p>
                            <input type="text" name="" id=""
                                placeholder="Thêm ghi chú cho món này..." style="padding: 10px;width: 80%;">
                        </div>
                        <div class="soluong p-1">
                            <p>Số Lượng: </p>
                            <div>
                                <button class="btn btn-sm btn-secondary" onclick="decreaseQuantity()">-</button>
                                <input type="text" id="quantity" value="1" readonly>
                                <button class="btn btn-sm btn-secondary" onclick="increaseQuantity()">+</button>
                            </div>
                        </div>
                        <a href="{{ route('add_to_cart', $products->id) }}" class="btn " role='button' style="background: #c19977;padding: 12px;margin-top: 15px;border-radius: 10px;font-weight: bold">Thêm vào giỏ hàng</a>
                        <a href="{{ route('cart') }}" class="btn " role='button' style="background: #c19977;padding: 12px;margin-top: 15px;border-radius: 10px;font-weight: bold">Đặt Hàng Ngay</a>
                    </div>
                    <div
                        style="padding: 10px;margin-top: 20px;border: 1px dashed chocolate;border-radius: 20px;width: 55%;font-size: 18px ">
                        <p>Nhập <span style="font-weight: bold">"Yeu Monster"</span></p>
                        <p>Giảm <span style="font-weight: bold">10k</span>, đơn tối thiểu <span
                                style="font-weight: bold">80k</span> </p>
                    </div>
                    <div
                        style="padding: 10px;margin-top: 20px;border: 1px dashed chocolate;border-radius: 20px;width: 55%;font-size: 17px ">
                        <p>Nhập <span style="font-weight: bold">"FREESHIP"</span></p>
                        <p>Freeship tới <span style="font-weight: bold">3km</span>, đơn tối thiểu <span
                                style="font-weight: bold">100k</span> </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div style="width: 80%;margin: 30px auto">
        <div style="border-bottom: 1px solid rgb(210, 180, 150);">
            <button
                style="padding: 13px;background: rgb(230, 180, 144);border-top-left-radius: 10px;border-top-right-radius:10px;border: none;color: #fff;font-weight:bold">Mô
                tả sản phẩm</button>
            <button
                style="padding: 13px;background: rgb(230, 180, 144);border-top-left-radius: 10px;border-top-right-radius:10px;border: none;color: #fff;font-weight:bold">
                Đánh Giá</button>
        </div>
        <div class="pt-5"
            style="font-size: 20px;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
            <p>{{ $products->description }}</p>
        </div>
    </div>
    <div class="product" style="width: 80%;margin: 40px auto">
        <h4 style="text-align: center;font-family: serif;color: #cb851c">Monter Coffee</h4>
        <a
            href=""style="text-align: center;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;color:black;text-decoration: none">
            <h2>Sản Phẩm Cùng Loại</h2>
        </a>
        <div style="text-align: center">
            <img src="https://bizweb.dktcdn.net/100/451/095/themes/894906/assets/bg-after-title.png?1664360071876"
                alt="" style="width: 120px;text-align: center">
        </div>
    </div>
    <div class="food" style="width: 80%;margin: 30px auto">
        <div class="row">
            <div class="col-lg-6">
                <div class="item-product">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="img-product pt-2">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/095/products/sp8.png?v=1648442442000"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-10" style="padding-top:15px ">
                            <div class="text-product"style="border-bottom: 1px solid rgb(158, 97, 47)">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href=""
                                            style="text-decoration: none;color: #6e480e;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">MOCHA
                                            RECIPE</a>
                                    </div>
                                    <div class="col-lg-7">
                                        <h6
                                            style="text-align: right;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:#6e480e">
                                            49.000₫</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-product">
                                <p>Cafe Mocha là gì? Mocha là 1 loại café được tạo cho từ Espresso & nữa nóng, thêm
                                    hương vị chocolate...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="item-product">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="img-product pt-2">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/095/products/sp6.png?v=1648442393000"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-10" style="padding-top:15px ">
                            <div class="text-product"style="border-bottom: 1px solid rgb(158, 97, 47)">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href=""
                                            style="text-decoration: none;color: #6e480e;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">LATTE</a>
                                    </div>
                                    <div class="col-lg-7">
                                        <h6
                                            style="text-align: right;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:#6e480e">
                                            59.000₫</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-product">
                                <p>Ly cà phê sữa ngọt ngào đến khó quên! Với một chút nhẹ nhàng hơn so với
                                    Cappuccino, Latte của chúng tôi bắt...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="item-product">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="img-product pt-2">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/095/products/sp5.png?v=1648442373000"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-10" style="padding-top:15px ">
                            <div class="text-product"style="border-bottom: 1px solid rgb(158, 97, 47)">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href=""
                                            style="text-decoration: none;color: #6e480e;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">AMERICANO
                                        </a>
                                    </div>
                                    <div class="col-lg-7">
                                        <h6
                                            style="text-align: right;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:#6e480e">
                                            45.000₫</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-product">
                                <p>Americano là sự kết hợp giữa cà phê espresso thêm vào nước đun sôi. Bạn có thể
                                    tùy thích lựa...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="item-product">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="img-product pt-2">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/095/products/sp4.png?v=1648442356000"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-10" style="padding-top:15px ">
                            <div class="text-product"style="border-bottom: 1px solid rgb(158, 97, 47)">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href=""
                                            style="text-decoration: none;color: #6e480e;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">ICED
                                            ESPRESSO</a>
                                    </div>
                                    <div class="col-lg-7">
                                        <h6
                                            style="text-align: right;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:#6e480e">
                                            49.000₫</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-product">
                                <p>Đích thực là ly cà phê espresso ngon đậm đà! Được chiết xuất một cách hoàn hảo từ
                                    loại cà...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="item-product">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="img-product pt-2">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/095/products/sp3.png?v=1648442334000"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-10" style="padding-top:15px ">
                            <div class="text-product"style="border-bottom: 1px solid rgb(158, 97, 47)">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href=""
                                            style="text-decoration: none;color: #6e480e;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Caramel
                                            Latte</a>
                                    </div>
                                    <div class="col-lg-7">
                                        <h6
                                            style="text-align: right;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:#6e480e">
                                            79.000₫</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-product">
                                <p>Ly cà phê sữa ngọt ngào đến khó quên! Với một chút nhẹ nhàng hơn so với
                                    Cappuccino, Latte của chúng tôi bắt...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="item-product">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="img-product pt-2">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/095/products/sp1.png?v=1648442297000"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-10" style="padding-top:15px ">
                            <div class="text-product"style="border-bottom: 1px solid rgb(158, 97, 47)">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href=""
                                            style="text-decoration: none;color: #6e480e;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">ESPRESSO</a>
                                    </div>
                                    <div class="col-lg-7">
                                        <h6
                                            style="text-align: right;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:#6e480e">
                                            49.000₫</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-product">
                                <p>Espresso là gì? Espresso là một loại café khá quen thuộc và được nhiều người lựa
                                    chọn vì hương vị...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .button {
            padding: 13px;
            border-radius: 10px;
            background: rgb(230, 180, 144);
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
        }

        :hover.button {
            color: #fff;
            background: rgb(210, 180, 150);
        }

        .carousel {
            position: relative;
        }

        .carousel-item img {
            object-fit: cover;
        }

        #carousel-thumbs {
            background: rgba(255, 255, 255, .3);
            bottom: 0;
            left: 0;
            padding: 0 50px;
            right: 0;
        }

        #carousel-thumbs img {
            border: 5px solid transparent;
            cursor: pointer;
        }

        #carousel-thumbs img:hover {
            border-color: rgba(255, 255, 255, .3);
        }

        #carousel-thumbs .selected img {
            border-color: #fff;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
        }

        @media all and (max-width: 767px) {
            .carousel-container #carousel-thumbs img {
                border-width: 3px;
            }
        }

        @media all and (min-width: 576px) {
            .carousel-container #carousel-thumbs {
                position: absolute;
            }
        }

        @media all and (max-width: 576px) {
            .carousel-container #carousel-thumbs {
                background: #ccccce;
            }
        }
    </style>
    <script>
        $('#myCarousel').carousel({
            interval: false
        });
        $('#carousel-thumbs').carousel({
            interval: false
        });

        $('[id^=carousel-selector-]').click(function() {
            var id_selector = $(this).attr('id');
            var id = parseInt(id_selector.substr(id_selector.lastIndexOf('-') + 1));
            $('#myCarousel').carousel(id);
        });
        if ($(window).width() < 575) {
            $('#carousel-thumbs .row div:nth-child(4)').each(function() {
                var rowBoundary = $(this);
                $('<div class="row mx-0">').insertAfter(rowBoundary.parent()).append(rowBoundary.nextAll()
                    .addBack());
            });
            $('#carousel-thumbs .carousel-item .row:nth-child(even)').each(function() {
                var boundary = $(this);
                $('<div class="carousel-item">').insertAfter(boundary.parent()).append(boundary.nextAll()
                    .addBack());
            });
        }
        if ($('#carousel-thumbs .carousel-item').length < 2) {
            $('#carousel-thumbs [class^=carousel-control-]').remove();
            $('.machine-carousel-container #carousel-thumbs').css('padding', '0 5px');
        }
        // when the carousel slides, auto update
        $('#myCarousel').on('slide.bs.carousel', function(e) {
            var id = parseInt($(e.relatedTarget).attr('data-slide-number'));
            $('[id^=carousel-selector-]').removeClass('selected');
            $('[id=carousel-selector-' + id + ']').addClass('selected');
        });
        // when user swipes, go next or previous
        $('#myCarousel').swipe({
            fallbackToMouseEvents: true,
            swipeLeft: function(e) {
                $('#myCarousel').carousel('next');
            },
            swipeRight: function(e) {
                $('#myCarousel').carousel('prev');
            },
            allowPageScroll: 'vertical',
            preventDefaultEvents: false,
            threshold: 75
        });
        $('#myCarousel .carousel-item img').on('click', function(e) {
            var src = $(e.target).attr('data-remote');
            if (src) $(this).ekkoLightbox();
        });

        function decreaseQuantity() {
            let quantityInput = document.getElementById('quantity');
            let currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
        }

        function increaseQuantity() {
            let quantityInput = document.getElementById('quantity');
            let currentQuantity = parseInt(quantityInput.value);

            quantityInput.value = currentQuantity + 1;
        }
    </script>
@endsection
