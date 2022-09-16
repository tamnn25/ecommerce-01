@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.edit_promotion'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.promotion_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.edit_promotion'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/promotions/promotion-edit.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    @php
        // define variable
        $begin = old('begin_date', $promotion->begin_date);
        $end = old('end_date', $promotion->end_date);

        // set with case data available
        if (!empty($begin) && !empty($end)) {
            $beginDate1 = date('Y-m-d H:i:s', strtotime($begin));
            $beginDate2 = date('Y-m-d H:i:s', strtotime($end));
        } else {
            // set default
            $beginDate1 = date('Y-m-d H:i:s');
            $beginDate2 = date('Y-m-d H:i:s', strtotime($beginDate1 . ' + 1 months'));
        }
    @endphp
    <script type="text/javascript">
        var beginDate1 = "{{ $beginDate1 }}";
        var beginDate2 = "{{ $beginDate2 }}";
    </script>
    <script src="/backend/js/promotions/promotion-edit.js"></script>
@endpush

@section('content')
    @include('errors.error')
    
    <form action="{{ route('admin.promotion.update', request()->route('id')) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-2">
            <div class="col-6 form-group">
                <label for="">{{ __('message.promotion_code') }}</label>
                <input type="text" value="{{ $promotion->code }}" class="form-control" disabled>
            </div>
            <div class="col-6 form-group">
                <label for="" class="required">Discount</label>
                <input type="number" name="discount" value="{{ old('discount', $promotion->discount) }}" placeholder="discount" class="form-control">
                @error('discount')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-6 form-group">
                <label for="" class="required">{{ __('message.quantity') }}</label>
                <input type="number" name="quantity" value="{{ old('quantity', $promotion->quantity) }}" placeholder="quantity" class="form-control">
                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6 form-group">
                <label for="">{{ __('message.status') }}</label><br>
                <input type="checkbox" name="status" placeholder="Status" class="" checked value="1">
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-6 form-group">
                <label for="" class="required">{{ __('message.begin_date') }}</label>
            <input type="text" name="begin_date" value="{{ old('begin_date', $promotion->begin_date) }}" class="form-control dt-begin-date">
                @error('begin_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="col-6 form-group">
                <label for="" class="required">{{ __('message.end_date') }}</label>
                <input type="text" name="end_date" value="{{ old('end_date', $promotion->end_date) }}" class="form-control dt-end-date">
                @error('end_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-2">
            <label for="">{{ __('message.product_list') }}</label>
            <select name="list_product[]" multiple="multiple" class="form-control select2-list-product">
                @foreach ($products as $key => $value)
                    <option value="{{ $key }}" {{ in_array($key, $listProductPromotion) ? 'selected' :'' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <p><span class="red">(*)</span> {{ __('message.required') }}</p>

        <div class="form-group">
            <a href="{{ route('admin.promotion.index') }}" class="btn btn-secondary"><i class="fas fa-long-arrow-alt-left"></i> <span class="ml-2">{{ __('message.promotion_list') }}</span></a>
            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> <span class="ml-2">{{ __('message.update') }}</span></button>
        </div>
    </form>
@endsection