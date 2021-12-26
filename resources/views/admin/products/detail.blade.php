@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Create Product')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'show ProductDetail')

{{-- import file css (private) --}}
@push('css')
<link rel="stylesheet" href="/admin/css/product/product-create.css">
@endpush

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">List Products</li>
        <li class="breadcrumb-item active" aria-current="page">Detail Products</li>
    </ol>
</nav>
<h4>Product</h4>
@include('errors.error')
<h1>{{ $product->name }}</h1>
<hr>
<img src="/{{ $product->thumbnail }}" alt="{{ $product->name }}" class="img-fluid" style="width: 200px; height: auto;">
<hr>
<h1>{{ $product->price.'.000 Vnd' }}</h1>
<hr>
<label>description</label>
<h3>{{ $product->description }}</h3>

<a href="{{ route('admin.product.index') }}">BACKHOME</a>

@endsection