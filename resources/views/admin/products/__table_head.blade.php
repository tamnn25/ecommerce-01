@php
// Sort Product Name (Desc)
$sortProductNameDesc = [
    'order_by' => 'name',
    'sorted_by' => 'desc',
];

// Sort Product Name (Asc)
$sortProductNameAsc = [
    'order_by' => 'name',
    'sorted_by' => 'asc',
];

// Sort Product Code (Desc)
$sortProductCodeDesc = [
    'order_by' => 'product_code',
    'sorted_by' => 'desc',
];

// Sort Product Code (Asc)
$sortProductCodeAsc = [
    'order_by' => 'product_code',
    'sorted_by' => 'asc',
];

// Sort Product Price (Desc)
$sortProductPriceDesc = [
    'order_by' => 'price',
    'sorted_by' => 'desc',
];

// Sort Product Price (Asc)
$sortProductPriceAsc = [
    'order_by' => 'price',
    'sorted_by' => 'asc',
];

// Sort Category Name (Desc)
$sortCategoryNameDesc = [
    'order_by' => 'category_name',
    'sorted_by' => 'desc',
];

// Sort Category Name (Asc)
$sortCategoryNameAsc = [
    'order_by' => 'category_name',
    'sorted_by' => 'asc',
];
@endphp

<thead class="bg-info">
    <tr>
        <th class="text-center">#</th>
        <th>{{ __('message.product_name') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'name' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'name' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.product_code') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'product_code' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductCodeDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'product_code' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductCodeAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductCodeAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductCodeDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.thumbnail') }}</th>
        <th>{{ __('message.price') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'price' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductPriceDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'price' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductPriceAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductPriceAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortProductPriceDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th>{{ __('message.category_name') }}
            <div class="d-inline-block">
                <div class="control-sort">
                    @if(request()->order_by == 'category_name' && request()->sorted_by == 'asc')
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortCategoryNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @elseif(request()->order_by == 'category_name' && request()->sorted_by == 'desc')
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortCategoryNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                    @else
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortCategoryNameAsc)) }}"><i class="fas fa-sort-up"></i></a>
                        <a href="{{ route('admin.product.index', array_merge($paramRequest, $sortCategoryNameDesc)) }}"><i class="fas fa-sort-down"></i></a>
                    @endif
                </div>
            </div>
        </th>
        <th colspan="4">{{ __('message.action') }}</th>
    </tr>
</thead>