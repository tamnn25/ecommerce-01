@php
$categorySearch = request()->get('category_id') ? request()->get('category_id') : [];
$priceSearch = request()->get('price') ? request()->get('price') : [];
@endphp

<!-- SHARING -->
<!-- jQuery Plugin Select2: https://select2.github.io/select2/ -->

<div class="mb-5 border p-3 bg-white section-search">
    <form action="{{ route('admin.product.index') }}" method="GET" id="frm-product-search">
        <input type="hidden" name="per_page" value="10" id="per-page">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">{{ __('message.keyword') }}</label>
                    <input type="text" class="form-control" name="keyword" placeholder="{{ __('message.keyword_product_search_ph') }}" value="{{ request()->get('keyword') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('message.category') }}</label>
                    <select name="category_id[]" class="form-control category-select2" multiple>
                        <option value=""></option>
                        @if(!empty($categories))
                        @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}" {{ in_array($categoryId, $categorySearch) ? 'selected' : ''  }}>{{ $categoryName }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="section-filter">
                    <label>{{ __('message.price') }}</label>
                    <ul class="list-unstyled">
                        <li>
                            <input type="checkbox" name="price[]" id="cb-price-1" value="1" {{ in_array(1, $priceSearch) ? 'checked' : null }}>
                            <label for="cb-price-1">Dưới 50.000 VNĐ</label>
                        </li>
                        <li>
                            <input type="checkbox" name="price[]" id="cb-price-2" value="2" {{ in_array(2, $priceSearch) ? 'checked' : null }}>
                            <label for="cb-price-2">50.000 VNĐ - 500.000 VNĐ</label>
                        </li>
                        <li>
                            <input type="checkbox" name="price[]" id="cb-price-3" value="3" {{ in_array(3, $priceSearch) ? 'checked' : null }}>
                            <label for="cb-price-3">500.000 VNĐ - 1000.000 VNĐ</label>
                        </li>
                        <li>
                            <input type="checkbox" name="price[]" id="cb-price-4" value="4" {{ in_array(4, $priceSearch) ? 'checked' : null }}>
                            <label for="cb-price-4">Lớn hơn 1000.000 VNĐ</label>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>

        <p>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('admin.product.index') }}'"><i class="fas fa-sync-alt"></i> {{ __('message.reset') }}</button>
            <button type="submit" class="btn btn-primary" title="{{ __('message.search_product') }}"><i class="fas fa-search"></i> {{ __('message.search') }}</button>
        </p>
    </form>
</div>