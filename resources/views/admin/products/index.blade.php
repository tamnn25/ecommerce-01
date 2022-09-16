@php
    // Get Param Request
    $paramRequest = request()->except('page');
@endphp

@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.product_list'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.product_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.product_list'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/products/product-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <!-- add plugin Price Format -->
    <script src="/plugins/priceformat/jquery.priceformat.min.js"></script>

    <script>
        var paramRequestJS = @json($paramRequest, JSON_PRETTY_PRINT);
        paramRequestJS['thuan'] = 123;
        console.log('paramRequestJS', paramRequestJS);
    </script>

    <!-- add jquery custom -->
    <script src="/backend/js/products/product-list.js"></script>
@endpush

@section('content')
    {{-- show message --}}
    @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
    @endif

    {{-- show error message --}}
    @if(Session::has('error'))
        <p class="text-danger">{{ Session::get('error') }}</p>
    @endif

    {{-- form search --}}
    @include('admin.products._search')

    {{-- display list product table --}}
    @include('admin.products._table')
@endsection