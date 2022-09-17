@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.create_promotion'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.promotion_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.create_promotion'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/promotions/promotion-create.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    @php
        // set Begin Date 1
        $beginDate1 = date('Y-m-d 00:00:00', strtotime($beginDate));

        // set Begin Date 2
        $beginDate2 = date('Y-m-d H:i:s', strtotime($beginDate1 . ' + 1 months'));
        $beginDate2 = date('Y-m-d 23:59:59', strtotime($beginDate2 . ' - 1 days'));
    @endphp
    <script type="text/javascript">
        var beginDate1 = "{{ $beginDate1 }}";
        var beginDate2 = "{{ $beginDate2 }}";
    </script>
    <script src="/backend/js/promotions/promotion-create.js"></script>
@endpush

@section('content')    
    @include('errors.error')
    
    <form action="{{ route('admin.promotion.store') }}" method="post">
        @csrf

        <div class="row mb-2">
            <div class="col-6 form-group">
                <label for="" class="required">{{ __('message.quantity') }}</label>
                <input type="number" name="quantity" class="form-control">
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
                <input type="text" name="begin_date" class="form-control dt-begin-date">
                @error('begin_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="col-6 form-group">
                <label for="" class="required">{{ __('message.end_date') }}</label>
                <input type="text" name="end_date" class="form-control dt-end-date">
                @error('end_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-2">
            <label for="">{{ __('message.product_list') }}</label>
            <select name="list_product[]" multiple="multiple" class="form-control select2-list-product">
                @foreach ($products as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <p><span class="red">(*)</span>: {{ __('message.required') }}</p>

        <div class="form-group">
            <a href="{{ route('admin.promotion.index') }}" class="btn btn-secondary"><i class="fas fa-long-arrow-alt-left"></i> <span class="ml-2">{{ __('message.promotion_list') }}</span></a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <span class="ml-2">{{ __('message.save') }}</span></button>
        </div>
    </form>
@endsection