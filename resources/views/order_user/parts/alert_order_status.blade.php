        @if ($order->status == \App\Models\Order::STATUS[0])
        <div class="btn btn-outline-primary" role="alert">Chưa thanh toán</div>
        @elseif ($order->status == \App\Models\Order::STATUS[1])
        <div class="btn btn-outline-secondary" role="alert">Đã thanh toán online</div>
        @elseif ($order->status == \App\Models\Order::STATUS[2])
        <div class="btn btn-outline-warning" role="alert">Shipper đang đi giao hàng</div>
        @elseif ($order->status == \App\Models\Order::STATUS[3])
        <div class="btn btn-outline-danger" role="alert">Cancel đơn hàng</div>
        @else
        <div class="btn btn-outline-success" role="alert">Hoàn thành</div>
        @endif