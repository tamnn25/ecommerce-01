@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Create Product')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Product Management')

{{-- import file css (private) --}}
@push('css')
<link rel="stylesheet" href="/admin/css/product/product-create.css">
@endpush

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">List Products</li>
        <li class="breadcrumb-item active" aria-current="page">Create Products</li>
    </ol>
</nav>
<h4>Create Product</h4>

@include('errors.error')

<form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-5">
        <label for="">Product Name</label>
        <input type="text" name="name" placeholder=" Enter Product name" value="{{ old('name') }}" class="form-control">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-5">
        <label for="">Product description</label>
        <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-5">
        <label for="">Product Images</label>
        <input type="file" name="image" placeholder=" Enter Product Image" class="form-control">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-5">
        <label for="">Product price</label>
        <input type="text" name="price" placeholder=" Enter Product price" value="{{ old('price') }}" class="form-control">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    `
    <div class="form-group mb-5">
        <label for="">Product quantity</label>
        <input type="text" name="quantity" placeholder=" Enter Product quantity" value="{{ old('quantity') }}" class="form-control">
        @error('quantity')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-5">
        <label for="">Category</label>
        <select name="category_id" class="form-control">
            @if(!empty($categories))
            @foreach ($categories as $categoryId => $categoryName)
            <option value="{{ $categoryId }}" {{ old('category_id') == $categoryId ? 'selected' : ''  }}>{{ $categoryName }}</option>
            @endforeach
            @endif
        </select>
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{-- <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">List Post</a> --}}
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>
@endsection