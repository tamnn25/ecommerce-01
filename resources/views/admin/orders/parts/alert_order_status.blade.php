@if (empty($order->status) || $order->status == \App\Models\Order::STATUS[0])
    <div class="text-primary">{{ __('message.status_payment_unpaid') }}</div>
@elseif ($order->status == \App\Models\Order::STATUS[1])
    <div class="text-secondary">{{ __('message.status_payment_online') }}</div>
@elseif ($order->status == \App\Models\Order::STATUS[2])
    <div class="text-info">{{ __('message.status_shipper_doing') }}</div>
@elseif ($order->status == \App\Models\Order::STATUS[3])
    <div class="text-danger">{{ __('message.status_cancel') }}</div>
@else
    <div class="text-success">{{ __('message.status_complete') }}</div>
@endif