@php
    // Get Param Request
    $paramRequest = request()->except('page');
@endphp

@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.customer_list'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.customer_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.customer_list'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/customers/customer-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <!-- add plugin Price Format -->
    <script src="/plugins/priceformat/jquery.priceformat.min.js"></script>

    <script>
        var paramRequestJS = @json($paramRequest, JSON_PRETTY_PRINT);
    </script>

    <!-- add jquery custom -->
    <script src="/backend/js/customers/customer-list.js"></script>
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
    @include('admin.customers._search')

    {{-- display list customer table --}}
    @include('admin.customers._table')
@endsection