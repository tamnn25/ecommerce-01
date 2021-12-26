@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Edit Post')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Post Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Edit Post')

{{-- import file css (private) --}}
@push('css')
<link rel="stylesheet" href="/admin/css/product/product-edit.css">
@endpush

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">List Products</li>
        <li class="breadcrumb-item active" aria-current="page">Edit Products</li>
    </ol>
</nav>
<h4>Update Products</h4>

@include('errors.error')

<form action="{{ route('admin.product.update', request()->route('id')) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group mb-5">
        <label for="">Product Name</label>
        <input type="text" name="name" placeholder="post name" value="{{ old('name', $product->name) }}" class="form-control">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-5">
        <label for="">Product description</label>
        <input type="text" name="description" placeholder="post description" value="{{ old('description', $product->description) }}" class="form-control">
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-5">
        <label for="">Product images</label>
        <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 150px; height: auto;">
        <input type="file" name="image" placeholder="product image" class="form-control">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-5">
        <label for="">product price</label>
        <input type="text" name="price" placeholder="product price" value="{{ old('price', $product->price) }}" class="form-control">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-5">
        <label for="">product quantity</label>
        <input type="text" name="quantity" placeholder="product quantity" value="{{ old('quantity', $product->quantity) }}" class="form-control">
        @error('quantity')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-5">
        <label for="">Category</label>
        <select name="category_id" class="form-control">
            <option value=""></option>
            @if(!empty($categories))
            @foreach ($categories as $categoryId => $categoryName)
            <option value="{{ $categoryId }}" {{ old('category_id', $product->category_id) == $categoryId ? 'selected' : ''  }}>{{ $categoryName }}</option>
            @endforeach
            @endif
        </select>
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Post</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection