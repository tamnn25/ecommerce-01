@php
// Sort Full Name (Desc)
$sortFullNameDesc = [
'order_by' => 'full_name',
'sorted_by' => 'desc',
];

// Sort Full Name (Asc)
$sortFullNameAsc = [
'order_by' => 'full_name',
'sorted_by' => 'asc',
];

// Sort Total Quantity (Desc)
$sortTotalQuantityDesc = [
'order_by' => 'total_quantity',
'sorted_by' => 'desc',
];

// Sort Total Quantity (Asc)
$sortTotalQuantityAsc = [
'order_by' => 'total_quantity',
'sorted_by' => 'asc',
];

// Sort Total Money (Desc)
$sortTotalMoneyDesc = [
'order_by' => 'total_money',
'sorted_by' => 'desc',
];

// Sort Total Money (Asc)
$sortTotalMoneyAsc = [
'order_by' => 'total_money',
'sorted_by' => 'asc',
];

// Sort Status (Desc)
$sortStatusDesc = [
'order_by' => 'status',
'sorted_by' => 'desc',
];

// Sort Status (Asc)
$sortStatusAsc = [
'order_by' => 'status',
'sorted_by' => 'asc',
];
@endphp

<thead class="bg-info">
    <tr>
        <th class="text-center">#</th>
        <th>{{ __('message.fullname') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'full_name' && request()->sorted_by == 'asc')
                    <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortFullNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'full_name' && request()->sorted_by == 'desc')
                    <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortFullNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                    <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortFullNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortFullNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <!-- <th>{{ __('message.total_quantity') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'total_quantity' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortTotalQuantityDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'total_quantity' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortTotalQuantityAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortTotalQuantityAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortTotalQuantityDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>        
        </th>
        <th>{{ __('message.total_money') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'total_money' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortTotalMoneyDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'total_money' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortTotalMoneyAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortTotalMoneyAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortTotalMoneyDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th> -->
        <th>{{ __('message.status') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'status' && request()->sorted_by == 'asc')
                    <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortStatusDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'status' && request()->sorted_by == 'desc')
                    <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortStatusAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                    <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortStatusAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    <a href="{{ route('admin.order.index', array_merge($paramRequest, $sortStatusDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.order_date') }}</th>
        <th colspan="4">{{ __('message.action') }}</th>
    </tr>
</thead>