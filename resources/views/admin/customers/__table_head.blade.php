@php
// Sort Customer Name (Desc)
$sortCustomerNameDesc = [
    'order_by' => 'name',
    'sorted_by' => 'desc',
];

// Sort Customer Name (Asc)
$sortCustomerNameAsc = [
    'order_by' => 'name',
    'sorted_by' => 'asc',
];

// Sort Customer Email (Desc)
$sortCustomerEmailDesc = [
    'order_by' => 'email',
    'sorted_by' => 'desc',
];

// Sort Customer Email (Asc)
$sortCustomerEmailAsc = [
    'order_by' => 'email',
    'sorted_by' => 'asc',
];

// Sort Customer Created At (Desc)
$sortCustomerCreatedAtDesc = [
    'order_by' => 'created_at',
    'sorted_by' => 'desc',
];

// Sort Customer Created At (Asc)
$sortCustomerCreatedAtAsc = [
    'order_by' => 'created_at',
    'sorted_by' => 'asc',
];
@endphp

<thead class="bg-info">
    <tr>
        <th class="text-center">#</th>
        <th>{{ __('message.customer.name') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'name' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'name' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.avatar') }}</th>
        <th>{{ __('message.email') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'email' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerEmailDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'email' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerEmailAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerEmailAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerEmailDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.created') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'created_at' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerCreatedAtDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'created_at' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerCreatedAtAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerCreatedAtAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.customer.index', array_merge($paramRequest, $sortCustomerCreatedAtDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th colspan="4">{{ __('message.action') }}</th>
    </tr>
</thead>