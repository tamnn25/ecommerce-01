@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.create_category'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.category_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.create_category'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/categories/category-create.css">
@endpush

@section('content')
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="required">{{ __('message.category_name') }}</label>
                    <input type="text" name="category_name" class="form-control">
                    @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <p><span class="red">(*)</span>: {{ __('message.required') }}</p>

        <div class="form-group">
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary"><i class="fas fa-long-arrow-alt-left"></i> <span class="ml-2">{{ __('message.category_list') }}</span></a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <span class="ml-2">{{ __('message.save') }}</span></button>
        </div>
    </form>
@endsection