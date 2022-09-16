@if (!empty($order->orderDetails))
    <div class="order-detail">
        <table class="table table-bordered table-striped">
            <thead class="bg-info">
                <tr>
                    <th>#</th>
                    <th>Thumbnail</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Money</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalMoney = 0;
                    $totalQuantity = 0;
                @endphp
                @foreach ($order->orderDetails as $key => $orderDetail)
                    @php
                        $money = $orderDetail->quantity * $orderDetail->price->price;
                        $totalMoney += $money;

                        $quantity = $orderDetail->quantity;
                        $totalQuantity += $quantity;

                        $price = $orderDetail->price->price;
                    @endphp
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img src="{{ $orderDetail->product->thumbnail }}" alt="{{ $orderDetail->product->name }}" class="img-fluid img-thumbnail"></td>
                        <td>{{ number_format($quantity) }}</td>
                        <td>{{ number_format($price) }}</td>
                        <td>{{ formatPrice($money) }}</td>
                    </tr>
                @endforeach
                <tfoot class="bg-secondary">
                    <tr>
                        <td colspan="2" class="text-right">Total Quantity</td>
                        <td class="text-bold">{{ number_format($totalQuantity) }}</td>
                        <td class="text-right">Total Money</td>
                        <td class="text-bold">{{ formatPrice($totalMoney) }}</td>
                    </tr>
                </tfoot>
            </tbody>
        </table>
    </div>
@endif