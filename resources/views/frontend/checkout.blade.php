
<div class="container">
    <h1 class="text-center mt-3 text-danger">Thanh toán</h1>
    <div class="row">
        <div class="col-md-9">
            <form action="{{route('site.cart.update')}}" method="post">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:90px">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $totalMoney=0;
                        @endphp
                        @foreach($list_cart as $row_cart)
                        <tr>
                            <td>
                                <img class="img-fluid" src="{{ asset('images/products/' .$row_cart['image']) }}" alt="{{$row_cart['image']}}">
                            </td>
                            <td>{{$row_cart['name']}}</td>
                            <td>
                                {{$row_cart['qty']}}
                            </td>
                            <td>{{number_format($row_cart['price'])}}</td>
                            <td>{{number_format($row_cart['price']*$row_cart['qty'])}}</td>
                        </tr>
                        @php
                        $totalMoney +=$row_cart['price']*$row_cart['qty'];
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
        <div class="col-md-3">
            <strong>Tổng tiền: {{number_format($totalMoney)}}</strong>
        </div>
    </div>


    @if (!Auth::check())
    <div class="row">
        <div class="col-12">
            <h3>Hãy đăng nhập để thanh toán</h3>
            <a href="{{route('website.getlogin')}}">Đăng nhập</a>
        </div>
    </div>
    @else
    <form action="{{route('site.cart.docheckout')}}" method="post">
        @csrf
        <div class="row">
            @php
            $user = Auth::user();
            @endphp
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Họ tên</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Điện thoại</label>
                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" value="{{$user->address}}" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <label for="">Ghi chú</label>
                <input type="text" name="note" class="form-control">
            </div>
            <div class="col-md-12 text-end mt-1">
                <button class="btn btn-success">Đặt mua</button>
            </div>
        </div>
    </form>
    @endif
</div>

