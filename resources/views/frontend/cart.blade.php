
<div class="container mt-5">
    <h2 class="text-center">Giỏ hàng</h2>
    <form action="{{route('site.cart.update')}}" method="post">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Hình ảnh</th>
                    <th class="text-center">Tên sản phẩm</th>
                    <th class="text-center">Đơn giá</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Thành tiền</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalMoney=0;
                @endphp
                @foreach ($list_cart as $row_cart)
                <tr>
                    <td class="text-center">
                        <a href="" class="text-dark">
                            <img class="card-img-top" src="{{asset('images/products/' . $row_cart['image'])}}" style="width: 100px">
                        </a>
                    </td>
                    <td class="text-center">{{$row_cart['name']}}</td>
                    <td class="text-center">{{number_format($row_cart['price'])}}</td>
                    <td class="text-center">
                        <input class="text-center" type="number" name="qty[{{$row_cart['id']}}]" value="{{$row_cart['qty']}}" min="1">
                    </td>
                    <td class="text-center">{{number_format($row_cart['price']*$row_cart['qty'])}}</td>
                    <td class="text-center">
                        <a href="{{route('site.cart.delete', ['id' => $row_cart['id']])}}">
                            <button type="button" class="rounded-2 btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                @php
                $totalMoney += $row_cart['price'] * $row_cart['qty'];
                @endphp
                @endforeach
            </tbody>
        </table>

        <div class="row ">
            <div class="col-9">
                <button class="btn btn-primary" type="submit">Cập nhật</button>
                <button class="btn btn-danger" type="button">Hủy giỏ hàng</button>
                <a class="btn btn-success" href="{{route('site.cart.checkout')}}" type="button">Thanh toán</a>
            </div>
            <div class="col-3">
                <strong>Tổng tiền: {{number_format($totalMoney)}}</strong>
            </div>
        </div>
    </form>
</div>