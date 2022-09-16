@if($orders->isEmpty())
    <p class="red">{{ __('message.not_found_data') }}</p>
@else
    <div class="d-flex justify-content-between">
        <div class="">
            <!-- Set Limit Record in Per Page -->
            <select name="per_page" onChange="submitFilterOrder(this)" class="d-inline-block ml-2 form-control-custom">
                <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
                <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
                <option value="200" {{ request()->per_page == 200 ? 'selected' : '' }}>200</option>
            </select>&nbsp;
            <label for="">{{ __('message.record_per_page') }}</label>
        </div>
        <div>
            {{ $orders->appends(request()->input())->links() }}
        </div>
    </div>

    <table id="order-list" class="table table-bordered table-hover table-striped">
        @include('admin.orders.__table_head')
        <tbody>
            @if(!empty($orders))
                @foreach ($orders as $key => $order)
                    <tr class="tr-order-{{ $order->id }}" data-order-id="{{ $order->id }}" data-full-name="{{ $order->full_name }}" data-total-quantity="{{ $order->total_quantity }}" data-total-money="{{ $order->total_money }}" data-status="{{ $order->status }}">
                        <td class="text-center">{{ $key+1 }}</td>
                        <td>{{ $order->full_name }}</td>
                        <td>{{ $order->total_quantity }}</td>
                        <td>{{ $order->total_money }}</td>
                        <td class="lbl-order-status">
                            @include('admin.orders.parts.alert_order_status')
                        </td>
                        <td>{{ $order->order_date }}</td>
                        <td>
                            <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-secondary btn-common"><i class="fas fa-search-plus"></i> {{ __('message.detail') }}</a>    
                        </td>
                        <td>
                            @if(in_array($order->status, [\App\Models\Order::STATUS[3], \App\Models\Order::STATUS[4]]))
                                <button type="button" class="btn btn-info btn-common btn-update-order-status" disabled><i class="far fa-calendar-check"></i> {{ __('message.update_order_status') }}</button>
                            @else
                                <button type="button" onclick="modalOrderStatus(this, '{{ route('admin.order.update-status', $order->id) }}', '{{ $order->status }}')" class="btn btn-info btn-common btn-update-order-status"><i class="far fa-calendar-check"></i> {{ __('message.update_order_status') }}</button>
                            @endif
                        </td>
                        <td>
                            @if(in_array($order->status, [\App\Models\Order::STATUS[3], \App\Models\Order::STATUS[4]]))
                                <button type="button" disabled class="btn btn-danger btn-common btn-delete"><i class="fas fa-trash-alt"></i> {{ __('message.delete') }}</button>
                            @else
                                <form action="{{ route('admin.order.destroy', $order->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('{{ __('message.confirm_delete') }}')" class="btn btn-danger btn-common btn-delete"><i class="fas fa-trash-alt"></i> {{ __('message.delete') }}</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <i class="fas fa-chevron-up cursor" onclick="processOrderDetail(this, {{ $order->id }})"></i>
                        </td>
                    </tr>

                    <tr class="order-detail order-{{ $order->id }}">
                        <td colspan="9">
                            @if($order->orderDetails)
                                <table class="table table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>{{ __('message.thumbnail') }}</th>
                                            <th>{{ __('message.quantity') }}</th>
                                            <th>{{ __('message.price') }}</th>
                                            <th colspan="3">{{ __('message.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderDetails as $keyOD => $orderDetail)
                                            <tr>
                                                <td class="text-center">{{ $keyOD + 1 }}</td>
                                                <td><img src="{{ asset($orderDetail->product->thumbnail) }}" alt="{{ $orderDetail->product->name }}" class="img-fluid" style="width: 240px; height: auto;"></td>
                                                <td>{{ $orderDetail->format_quantity }}</td>
                                                <td>{{ $orderDetail->format_price }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-between">
        <div>
            @php
                $currentPage = $orders->currentPage() - 1;
                $perPage = $orders->perPage();
                $total = $orders->total();
                $from = ($currentPage * $perPage) + 1;
                $to = ($currentPage * $perPage) + $perPage;
            @endphp
            {{ __('message.show_per_page', ['from' => $from, 'to' => $to, 'total' => $total]) }}
        </div>
        <div class="">
            {{ $orders->appends(request()->input())->links() }}
        </div>
    </div>
@endif
