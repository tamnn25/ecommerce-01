@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', 'Create Category')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Category Management')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'Create Category')

{{-- import file css (private) --}}
@push('css')
<link rel="stylesheet" href="/css/categories/category-create.css">
@endpush

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">List Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<h4>Create Category</h4>

@include('errors.error')

<form action="{{ route('admin.category.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Category Name:</label>
        <input class="form-control" type="text" name="category_name" placeholder="category name">
    </div>
    <div class="form-group">
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">List Category</a>
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>
@endsection