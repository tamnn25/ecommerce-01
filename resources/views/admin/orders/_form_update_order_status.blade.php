@php
    $totalQuantity = 0;
    $totalMoney = 0;
    if (!empty($order->orderDetails)) {
        foreach ($order->orderDetails as $od) {
            // get quantity
            $totalQuantity += $od->quantity;

            // get price
            $productPrice = $od->price->price;
            $totalMoney += $od->quantity * $productPrice;
        }
    }
@endphp

<form action="{{ route('admin.order.update', request()->route('id')) }}" method="post">
    @csrf
    @method('put')

    <div class="mb-2">
        <label for="">Fullname</label>
        <p>{{ $order->user->name }}</p>
    </div>
    <div class="mb-2">
        <label for="">Total Quantity</label>
        <p>{{ number_format($totalQuantity) }}</p>
    </div>
    <div class="mb-2">
        <label for="">Total Money</label>
        <p>{{ number_format($totalMoney) }}</p>
    </div>
    <div class="mb-2">
        <label for="">Status</label>
        <ul>
            <li>
                <input type="radio" name="status" id="order-status-0" value="{{ \App\Models\Order::STATUS[0] }}" {{ $order->status == \App\Models\Order::STATUS[0] ? 'checked' : '' }}>
                <label for="order-status-0">chưa thanh toán</label>
            </li>
            <li>
                <input type="radio" name="status" id="order-status-1" value="{{ \App\Models\Order::STATUS[1] }}" {{ $order->status == \App\Models\Order::STATUS[1] ? 'checked' : '' }}>
                <label for="order-status-1">đã thanh toán online</label>
            </li>
            <li>
                <input type="radio" name="status" id="order-status-2" value="{{ \App\Models\Order::STATUS[2] }}" {{ $order->status == \App\Models\Order::STATUS[2] ? 'checked' : '' }}>
                <label for="order-status-2">shipper đang đi giao hàng</label>
            </li>
            <li>
                <input type="radio" name="status" id="order-status-3" value="{{ \App\Models\Order::STATUS[3] }}" {{ $order->status == \App\Models\Order::STATUS[3] ? 'checked' : '' }}>
                <label for="order-status-3">cancel đơn hàng</label>
            </li>
            <li>
                <input type="radio" name="status" id="order-status-4" value="{{ \App\Models\Order::STATUS[4] }}" {{ $order->status == \App\Models\Order::STATUS[4] ? 'checked' : '' }}>
                <label for="order-status-4">hoàn thành</label>   
            </li>
        </ul>
    </div>
    <div class="mb-2">
        <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
