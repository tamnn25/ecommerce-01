@php
// Get Param Request
$paramRequest = request()->except('page');
@endphp

@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.user_list'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.user_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.user_list'))

{{-- import file css (private) --}}
@push('css')
<link rel="stylesheet" href="/backend/css/users/user-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
<!-- add plugin Price Format -->
<script src="/plugins/priceformat/jquery.priceformat.min.js"></script>

<script>
    var paramRequestJS = @json($paramRequest, JSON_PRETTY_PRINT);
</script>

<!-- add jquery custom -->
<script src="/backend/js/users/user-list.js"></script>
@endpush

@section('content')


{{-- show error message --}}
@if(Session::has('error'))
<p class="text-danger">{{ Session::get('error') }}</p>
@endif

{{-- form search --}}
@include('admin.comment._search')

{{-- display list user table --}}
@include('admin.comment._table')
@endsection