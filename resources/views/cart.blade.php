@extends('layout')
@section('content')
    <div class="cart" style="width: 80%; margin: 40px auto">
        <h4 style="text-align: center;font-family: serif;color: #cb851c">Monter Coffee</h4>
        <a
            href=""style="text-align: center;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;color:black;text-decoration: none">
            <h2>Giỏ Hàng Của Bạn</h2>
        </a>
        <div style="text-align: center;padding-bottom: 40px ">
            <img src="https://bizweb.dktcdn.net/100/451/095/themes/894906/assets/bg-after-title.png?1664360071876"
                alt="" style="width: 120px;text-align: center">
        </div>
        <table id="cart" class="table table-hover table-condensed ">
            <thead>
                <tr>
                    <th style="width: 50%">
                        Sản Phẩm
                    </th>
                    <th style="width: 10%">
                        Đơn Giá
                    </th>
                    <th style="width: 10%">
                        Số Lượng
                    </th>
                    <th style="width: 20% ;text-align: center">
                        Số Tiền
                    </th>
                    <th style="width: 10%">
                        Thao Tác
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        @php
                            $total += $details['price'] * $details['quantity'];
                        @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{ $details['image'] }}" alt="" width="100%" height="130px">
                                    </div>
                                    <div class="col-lg-9 ">
                                        <div class="nomargin">
                                            <h4 style="padding-top: 45px">{{ $details['name'] }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">
                                <h5 style="padding-top: 45px">{{ $details['price'] }}$</h5>
                            </td>
                            <td data-th="Quantity">
                                <input type="number" name="" id="" value="{{ $details['quantity'] }}"
                                    min="1" class="form-control quantity cart_update" style="margin-top: 40px">
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                <h5 style="padding-top: 45px">{{ $details['price'] * $details['quantity'] }}$</h5>
                            </td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm cart_remove" style="margin-top: 45px"><i
                                        class="fas fa-trash-alt"></i>
                                    Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: right;padding: 20px">
                        <h3><strong>Tổng: {{ $total }}$</strong></h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="5"class="text-right">
                        <a href="{{ url('product') }}" class="btn btn-danger"><i class="fas fa-hand-point-left"></i> TIẾP
                            TỤC
                            XEM SẢN PHẨM</a>
                        <button class="btn btn-success">Cập Nhật Giỏ Hàng</button>
                        <a class="btn btn-danger" href="{{ route('checkout') }}">Thanh toán ngay</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Bạn có chắc muốn xóa sản phẩm?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
