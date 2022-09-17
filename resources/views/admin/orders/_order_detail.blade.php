@if (!empty($order->orderDetail))
<div>
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
            @foreach ($order->orderDetail as $key => $orderDetails)
            @php

            $money = $orderDetails->quantity * $orderDetails->price;
            $totalMoney += $money;

            $quantity = $orderDetails->quantity;
            $totalQuantity += $quantity;

            $price = $orderDetails->price;
            @endphp
            <tr>
                <td>{{ ++$key }}</td>
                <td><img src="{{asset($orderDetails->product->thumbnail) }}" alt="{{ $orderDetails->product->name }}" class="img-fluid img-thumbnail"></td>
                <td>{{ number_format($quantity) }}</td>
                <td>{{ number_format($price) }}</td>
                <td>{{ $money }}</td>
            </tr>
            @endforeach
        <tfoot class="bg-secondary">
            <tr>
                <td colspan="2" class="text-right">Total Quantity</td>
                <td class="text-bold">{{ number_format($totalQuantity) }}</td>
                <td class="text-right">Total Money</td>
                <td class="text-bold">{{ $totalMoney }}</td>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
@endif