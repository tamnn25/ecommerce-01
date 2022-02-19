<!doctype html>
<html lang="en">

<head>
    <title>BOOK-SHOP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <h1>Xin chào!</h1>
    <p>Cảm ơn bạn đã tin tưởng và lựa chọn mua sắm tại cửa hàng của chúng tôi.</p>

    <table class="table table-bordered table-hover" id="tbl-list-product">
        <thead class="thead-dark">
            <tr>
                <th colspan="3">Tên sản phẩm</th>
                <th colspan="3">Sản phẩm</th>
                <th colspan="3">Số lượng</th>
                <th colspan="3">Giá</th>
                <th colspan="3">Thành tiền</th>
            </tr>
        </thead>
        @foreach ($carts as $key => $cart)
        <tbody>
            <tr>
                <td class="shoping__cart__item" colspan="3">
                    <img src="{{asset( $cart['image']) }}" style="width:120px" alt=" {{  $cart['name'] }}">

                </td>
                <td class="shoping__cart__name" colspan="3">
                    <h5> {{ $cart['name'] }}</h5>
                </td>
                <td class="shoping__cart__quantity" colspan="3">
                    <div class="quantity">
                        {{ number_format($cart['quantity']) }}
                    </div>
                </td>
                <td colspan="3">
                    <div class="product-price">
                        {{ number_format( $cart['price'])}} VND
                    </div>
                </td>
                <td colspan="3">
                    <div class="cart-money">
                        @php
                        $money = $cart['quantity'] * $cart['price'];
                        echo number_format($money) . ' VND';
                        @endphp
                    </div>
                </td>

            </tr>
        </tbody>
        @endforeach
    </table>

    <p>Cảm ơn !!</p>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>