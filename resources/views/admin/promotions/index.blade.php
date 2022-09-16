@php
    // Get Param Request
    $paramRequest = request()->except('page');
@endphp

@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.promotion_list'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.promotion_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.promotion_list'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/promotions/promotion-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="/backend/js/promotions/promotion-list.js"></script>
@endpush

@section('content')
    {{-- form search --}}
    @include('admin.promotions._search')

    {{-- show message --}}
    @include('errors.error')

    {{-- display list promotion table --}}
    @include('admin.promotions._table')
@endsection