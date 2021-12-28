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

@if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
@endif

{{-- show error message --}}
@if(Session::has('error'))
<p class="text-danger">{{ Session::get('error') }}</p>
@endif

<form action="{{ route('admin.category.store') }}" method="post">
    @csrf
    <div class="form-group col-md-6">
        <label for="">Category Name:</label>
        <input class="form-control" type="text" name="category_name" placeholder="category name">
    </div>
    <div class="form-group col-md-6">
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">List Category</a>
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>
@endsection