@php
// Get Param Request
$paramRequest = request()->except('page');
@endphp

@extends('admin.layouts.master')

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.report_order'))

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
@include('admin.report._search')

@if(!empty($order))
<table class="table table-bordered table-hover" id="tbl-list-product">
    <thead class="thead-dark">
        <tr>
            <th>Hình ảnh sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>

        </tr>
    </thead>
    @foreach ($order as $key => $orders)
    @foreach($orders->orderDetail as $key => $orderDetails)
    <tbody>
        <tr>
            <td class="shoping__cart__item">
                <img src="{{ asset($orderDetails->product->thumbnail) }}" width="150px" alt=" {{  $orderDetails->product->name }}">

            </td>
            <td class="shoping__cart__name">
                <h5> {{ $orderDetails->product->name }}</h5>
            </td>
            <td class="shoping__cart__quantity">

                <h5>{{ $orderDetails->quantity }}</h5>
            </td>
            <td>
                <div class="product-price">
                    {{ $orderDetails->price }} VNĐ
                </div>
            </td>
            <td>
                <div class="cart-money">
                    {{$orderDetails->total}}
                </div>
            </td>
        </tr>
    </tbody>
    @endforeach
    @endforeach
</table>
<div class="d-flex">
    <div class="ml-auto p-2">
        <h4><b>Tổng giá tiền: </b> {{ $total . 'VND' }}</h4>
    </div>
</div>

</div>
<br>
<br>
</div>

@else
Giỏ hàng rổng
@endif
@endsection