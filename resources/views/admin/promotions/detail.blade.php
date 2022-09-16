@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Detail Promotion')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Promotion Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Detail Promotion')

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
    <h4>Edit Promotion</h4>
    
    @include('errors.error')
    
    <div class="row mb-2">
        <div class="col-6 form-group">
            <label for="">Promotion Name</label>
            <input type="text" name="name" disabled placeholder="promotion name" value="{{ old('name', $promotion->name) }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-6 form-group">
            <label for="">Discount</label>
            <input type="number" name="discount" disabled value="{{ old('discount', $promotion->discount) }}" placeholder="discount" class="form-control">
            @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-6 form-group">
            <label for="">Quantity</label>
            <input type="number" name="quantity" disabled value="{{ old('quantity', $promotion->quantity) }}" placeholder="quantity" class="form-control">
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-6 form-group">
            <label for="">Status</label><br>
            <input type="checkbox" name="status" disabled placeholder="Status" class="" checked value="1">
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-6 form-group">
            <label for="">Begin Date</label>
        <input type="text" name="begin_date" disabled value="{{ old('begin_date', $promotion->begin_date) }}" placeholder="Begin Date" class="form-control dt-begin-date">
            @error('begin_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-6 form-group">
            <label for="">End Date</label>
            <input type="text" name="end_date" disabled value="{{ old('end_date', $promotion->end_date) }}" placeholder="End Date" class="form-control dt-end-date">
            @error('end_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-2">
        <label for="">List Product</label>
        <select name="list_product[]" multiple="multiple" disabled class="form-control select2-list-product">
            @foreach ($products as $key => $value)
                <option value="{{ $key }}" {{ in_array($key, $listProductPromotion) ? 'selected' :'' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-5 text-left">
        <a href="{{ route('admin.promotion.index') }}" class="btn btn-info">List Promotion</a>
    </div>
@endsection