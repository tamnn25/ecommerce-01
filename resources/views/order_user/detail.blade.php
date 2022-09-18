@extends('layouts.master')

{{-- set page title --}}
@section('title', 'Detail Order')

{{-- set breadcrumbName --}}

@section('breadcrumbName', 'Order Detail')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Detail Order')

{{-- import file css (private) --}}
@push('css')
<link rel="stylesheet" href="/backend/css/orders/order-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
<script src="/backend/js/orders/order-list.js"></script>
@endpush

@section('content')

<hr><br> <br>
<h4>Chi tiết đơn hàng</h4>
<br>
{{-- show message --}}
@include('errors.error')

{{-- display form orderDetail --}}

<table id="category-list" class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->orderDetail as $key => $order)
        <tr>
            <td>{{$key+1}}</td>
            <td><img src="/{{$order->product->thumbnail}}" width="150px" alt=""></td>
            <td>{{$order->product->name}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->price}} VNĐ</td>
            <td>{{$order->total}} VNĐ</td>
        </tr>
        @endforeach

    </tbody>
</table>
<button class="btn btn-danger"><h5><a href="{{route('order_user.list_order')}}">Trở về</a></h5></button>
@endsection