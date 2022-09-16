@extends('admin.layouts.master')

{{-- set page title --}}
@section('title', __('message.category_list'))

{{-- set breadcrumbName --}}
@section('breadcrumbName', __('message.category_management'))

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', __('message.category_list'))

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/backend/css/categories/category-list.css">
@endpush

@section('content')
    {{-- form search --}}
    @include('admin.categories._search')

    {{-- show message --}}
    @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
    @endif

    {{-- show error message --}}
    @if(Session::has('error'))
        <p class="text-danger">{{ Session::get('error') }}</p>
    @endif

    {{-- display list category table --}}
    @if($categories->isEmpty())
        <p class="red">{{ __('message.not_found_data') }}</p>
    @else
        <table id="category-list" class="table table-bordered table-hover table-striped">
            <thead class="bg-info">
                <tr>
                    <th class="text-center">#</th>
                    <th>{{ __('message.category_name') }}</th>
                    <th>{{ __('message.product_list') }}</th>
                    <th colspan="2">{{ __('message.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($categories))
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td><a href="{{ route('admin.product.index', ['category_id[]' => $category->id]) }}" class="btn btn-link btn-common"><i class="fas fa-search-plus"></i><span class="ml-2">{{ __('message.view_product_list') }} (<span class="font-weight-bold">{{ $category->product_count }}</span>)</span></a></td>
                            <td><a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info btn-common" title="{{ __('message.edit_product') }}"><i class="fas fa-edit"></i> {{ __('message.edit') }}</a></td>
                            <td>
                                @if($category->product_count && $category->product_count > 0)
                                    <button type="button" class="btn btn-danger btn-common" disabled><i class="fas fa-trash-alt"></i> {{ __('message.delete') }}</button>
                                @else
                                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-common" onclick="return confirm('{{ __('message.confirm_delete') }}')"><i class="fas fa-trash-alt"></i> {{ __('message.delete') }}</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    @endif
@endsection
