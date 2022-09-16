@php
// Sort Promotion Code (Desc)
$sortPromotionCodeDesc = [
    'order_by' => 'promotion_code',
    'sorted_by' => 'desc',
];

// Sort Promotion Code (Asc)
$sortPromotionCodeAsc = [
    'order_by' => 'promotion_code',
    'sorted_by' => 'asc',
];

// Sort Promotion Discount (Desc)
$sortPromotionDiscountDesc = [
    'order_by' => 'discount',
    'sorted_by' => 'desc',
];

// Sort Promotion Discount (Asc)
$sortPromotionDiscountAsc = [
    'order_by' => 'discount',
    'sorted_by' => 'asc',
];

// Sort Promotion Begin Date (Desc)
$sortPromotionBeginDateDesc = [
    'order_by' => 'begin_date',
    'sorted_by' => 'desc',
];

// Sort Promotion Begin Date (Asc)
$sortPromotionBeginDateAsc = [
    'order_by' => 'begin_date',
    'sorted_by' => 'asc',
];

// Sort Promotion End Date (Desc)
$sortPromotionEndDateDesc = [
    'order_by' => 'end_date',
    'sorted_by' => 'desc',
];

// Sort Promotion End Date (Asc)
$sortPromotionEndDateAsc = [
    'order_by' => 'end_date',
    'sorted_by' => 'asc',
];
@endphp

<thead class="bg-info">
    <tr>
        <th class="text-center">#</th>
        <th>{{ __('message.promotion_code') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'promotion_code' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionCodeDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'promotion_code' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionCodeAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionCodeAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionCodeDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.discount') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'discount' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionDiscountDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'discount' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.Promotion.index', array_merge($paramRequest, $sortPromotionDiscountAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionDiscountAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionDiscountDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.begin_date') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'begin_date' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionBeginDateDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'begin_date' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionBeginDateAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionBeginDateAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionBeginDateDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.end_date') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'end_date' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionEndDateDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'end_date' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionEndDateAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionEndDateAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.promotion.index', array_merge($paramRequest, $sortPromotionEndDateDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th colspan="4">{{ __('message.action') }}</th>
    </tr>
</thead>