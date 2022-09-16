@if($products->isEmpty())
{{-- create product link --}}
<div class="d-inline-block mb-2"><a href="{{ route('admin.product.create') }}" class="btn btn-primary" title="{{ __('message.create_product') }}"><i class="fas fa-plus"></i> {{ __('message.create') }}</a></div>

<p class="red">{{ __('message.not_found_data') }}</p>
@else
<div class="d-flex justify-content-between">
    <div class="">
        {{-- create product link --}}
        <div class="d-inline-block"><a href="{{ route('admin.product.create') }}" class="btn btn-primary" title="{{ __('message.create_product') }}"><i class="fas fa-plus"></i> {{ __('message.create') }}</a></div>

        <!-- Set Limit Record in Per Page -->
        <select name="per_page" onChange="submitFilterProduct(this)" class="d-inline-block ml-2 form-control-custom">
            <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
            <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
            <option value="200" {{ request()->per_page == 200 ? 'selected' : '' }}>200</option>
        </select>&nbsp;
        <label for="">{{ __('message.record_per_page') }}</label>
    </div>
    <div>
        {{ $products->appends(request()->input())->links() }}
    </div>
</div>

<table id="product-list" class="table table-bordered table-hover table-striped">
    @include('admin.products.__table_head')
    <tbody>
        @if(!empty($products))
        @foreach ($products as $key => $product)
        <tr>
            <td class="text-center">{{ $key+1 }}</td>
            <td>{{ $product->name }} (<span class="font-weight-bold">{{ $product->order_detail_count }} {{ __('message.order') }}</span>)</td>
            <td>{{ $product->code }}</td>
            <td>
                <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 240px; height: auto;">
            </td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category->name }}</td>
            <td><a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-secondary btn-common" title="{{ __('message.detail_product') }}"><i class="fas fa-search-plus"></i> {{ __('message.detail') }}</a></td>
            <td><a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info btn-common" title="{{ __('message.edit_product') }}"><i class="fas fa-edit"></i> {{ __('message.edit') }}</a></td>
            <td>
                @if($product->order_detail_count && $product->order_detail_count > 0)
                <button type="button" class="btn btn-danger btn-common" disabled><i class="fas fa-trash-alt"></i> {{ __('message.delete') }}</button>
                @else
                <form action="{{ route('admin.product.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-common" onclick="return confirm('{{ __('message.confirm_delete_product') }}')" title="{{ __('message.delete_product') }}"><i class="fas fa-trash-alt"></i> {{ __('message.delete') }}</button>
                </form>
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
        $currentPage = $products->currentPage() - 1;
        $perPage = $products->perPage();
        $total = $products->total();
        $from = ($currentPage * $perPage) + 1;
        $to = ($currentPage * $perPage) + $perPage;
        @endphp
        {{ __('message.show_per_page', ['from' => $from, 'to' => $to, 'total' => $total]) }}
    </div>
    <div class="">
        {{ $products->appends(request()->input())->links() }}
    </div>
</div>
@endif