@php
// Sort User Name (Desc)
$sortUserNameDesc = [
'order_by' => 'name',
'sorted_by' => 'desc',
];

// Sort User Name (Asc)
$sortUserNameAsc = [
'order_by' => 'name',
'sorted_by' => 'asc',
];

// Sort User Email (Desc)
$sortUserEmailDesc = [
'order_by' => 'email',
'sorted_by' => 'desc',
];

// Sort User Email (Asc)
$sortUserEmailAsc = [
'order_by' => 'email',
'sorted_by' => 'asc',
];

// Sort User Created At (Desc)
$sortUserCreatedAtDesc = [
'order_by' => 'created_at',
'sorted_by' => 'desc',
];

// Sort User Created At (Asc)
$sortUserCreatedAtAsc = [
'order_by' => 'created_at',
'sorted_by' => 'asc',
];
@endphp

<thead class="bg-info">
    <tr>
        <th class="text-center">#</th>
        <th>{{ __('message.user.name') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'name' && request()->sorted_by == 'asc')
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'name' && request()->sorted_by == 'desc')
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>Tên sản phẩm</th>
        <th>Nội dung</th>
        <th>Đánh giá</th>
        <th>{{ __('message.email') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'email' && request()->sorted_by == 'asc')
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserEmailDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'email' && request()->sorted_by == 'desc')
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserEmailAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserEmailAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserEmailDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.created') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'created_at' && request()->sorted_by == 'asc')
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserCreatedAtDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'created_at' && request()->sorted_by == 'desc')
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserCreatedAtAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserCreatedAtAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    <a href="{{ route('admin.user.index', array_merge($paramRequest, $sortUserCreatedAtDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th colspan="4">{{ __('message.action') }}</th>
    </tr>
</thead>