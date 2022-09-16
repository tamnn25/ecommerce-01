@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.edit_category'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.category_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.edit_category'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/categories/category-edit.css">
@endpush

@section('content')
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="required">{{ __('message.category_name') }}</label>
                    <input type="text" name="category_name" value="{{ old('category_name', $category->name) }}" class="form-control">
                    @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        
        <p><span class="red">(*)</span> {{ __('message.required') }}</p>

        <div class="form-group">
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary"><i class="fas fa-long-arrow-alt-left"></i> <span class="ml-2">{{ __('message.category_list') }}</span></a>
            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> <span class="ml-2">{{ __('message.update') }}</span></button>
        </div>
    </form>
@endsection