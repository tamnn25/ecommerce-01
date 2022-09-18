@php
$totalMoney = 0;
$totalQuantity = 0;
$newTotal = 0;
$newQuantity = 0;
@endphp

<div class="border p-2">
    <div class="mb-3"><h4><b>Thông tin đơn hàng</b></h4></div>
    {{-- Thông Tin Đơn Hàng --}}
    <table class="table">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>

        </thead>
        <tbody>

            @if (!empty($carts))
            @foreach ($carts as $cart)
            @php
            $totalQuantity = $cart['quantity'];
            $totalMoney = $cart['quantity'] * $cart ['price'];
            @endphp
            <tr class="">
                <div class="list-product">
                    <div class="product-detail">
                        <td>
                            <p><img src="/{{ $cart['image'] }}" alt="{{ $cart['name'] }}" width="120" class="img-fluid"></p>
                        </td>
                        <td>
                            <p>{{ $cart['name'] }}</p>
                        </td>
                        <td>
                            <p>{{ number_format($cart['price'])}} VND</p>
                        </td>
                        <td>
                            <p>{{ $cart['quantity']}}</p>
                        </td>
                        <td>
                            <p>{{ number_format($totalMoney)}} VND</p>
                        </td>
                    </div>
                </div>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            @php
            $totalMoney += $totalMoney;
            // $totalQuantity += $totalQuantity;
            @endphp
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Tổng tiền: </td>
                <td>{{ number_format($total) . 'VND' }}</td>
            </tr>
        </tfoot>
    </table>
</div>