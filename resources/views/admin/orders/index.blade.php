@php
    // Get Param Request
    $paramRequest = request()->except('page');
@endphp

@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.order_list'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.order_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.order_list'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/orders/order-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/backend/js/orders/order-list.js"></script>
    
    <!-- import script process for Ajax -->
    @include('admin.orders.parts.ajax_update_order_status')
@endpush

@section('content')
    {{-- form search --}}
    @include('admin.orders._search')

    {{-- show message --}}
    @include('errors.error')

    {{-- display list order table --}}
    @include('admin.orders._table')

    {{-- modal update order status  --}}
    @include('admin.orders.parts.modal_update_order_status')
@endsection