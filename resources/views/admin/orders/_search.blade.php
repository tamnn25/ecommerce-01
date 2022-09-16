@php
    $status = request()->get('status');
    $status = !empty($status) && is_array($status) ? $status : [];
@endphp

<div class="mb-5 border p-3 bg-white section-search">
    <form action="{{ route('admin.order.index') }}" method="GET" id="frm-order-search">
        <input type="hidden" name="per_page" value="10" id="per-page">
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">{{ __('message.customer.name') }}</label>
                    <input type="text" class="form-control" name="full_name" value="{{ request()->get('full_name') }}">
                </div>

                <div class="mb-3">
                    <label for="">{{ __('message.money') }}</label>
                    <div class="d-flex align-items-center">
                        <input type="text" name="from_money" class="form-control" value="{{ request()->get('from_money') }}">
                        <i class="ml-2">-</i>
                        <input type="text" name="to_money" class="form-control ml-2" value="{{ request()->get('to_money') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="">{{ __('message.quantity') }}</label>
                    <div class="d-flex align-items-center">
                        <input type="text" name="from_quantity" class="form-control" value="{{ request()->get('from_quantity') }}">
                        <i class="ml-2">-</i>
                        <input type="text" name="to_quantity" class="form-control ml-2" value="{{ request()->get('to_quantity') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="">{{ __('message.order_date') }}</label>
                    <div class="d-flex align-items-center">
                        <input type="text" name="from_order_date" class="form-control datepicker datepicker-from-order-date" value="{{ request()->get('from_order_date') }}">
                        <i class="ml-2">-</i>
                        <input type="text" name="to_order_date" class="form-control ml-2 datepicker datepicker-to-order-date" value="{{ request()->get('to_order_date') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">{{ __('message.status') }}</label><br>
                    <div class="d-flex flex-column">
                        <div class="pr-2">
                            <input type="checkbox" name="status[]" value="{{ \App\Models\Order::STATUS[0] }}" id="status-0" {{ in_array(\App\Models\Order::STATUS[0], $status) ? 'checked' : null }}>
                            <label for="status-0">{{ __('message.status_payment_unpaid') }}</label>
                        </div>
                        <div class="pr-2">
                            <input type="checkbox" name="status[]" value="{{ \App\Models\Order::STATUS[1] }}" id="status-1" {{ in_array(\App\Models\Order::STATUS[1], $status) ? 'checked' : null }}>
                            <label for="status-1">{{ __('message.status_payment_online') }}</label>
                        </div>
                        <div class="pr-2">
                            <input type="checkbox" name="status[]" value="{{ \App\Models\Order::STATUS[2] }}" id="status-2" {{ in_array(\App\Models\Order::STATUS[2], $status) ? 'checked' : null }}>
                            <label for="status-2">{{ __('message.status_shipper_doing') }}</label>
                        </div>
                        <div class="pr-2">
                            <input type="checkbox" name="status[]" value="{{ \App\Models\Order::STATUS[3] }}" id="status-3" {{ in_array(\App\Models\Order::STATUS[3], $status) ? 'checked' : null }}>
                            <label for="status-3">{{ __('message.status_cancel') }}</label>
                        </div>
                        <div>
                            <input type="checkbox" name="status[]" value="{{ \App\Models\Order::STATUS[4] }}" id="status-4" {{ in_array(\App\Models\Order::STATUS[4], $status) ? 'checked' : null }}>
                            <label for="status-4">{{ __('message.status_complete') }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    
        <p>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('admin.order.index') }}'"><i class="fas fa-sync-alt"></i> {{ __('message.reset') }}</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> {{ __('message.search') }}</button>
        </p>
    </form>
</div>
