@extends('admin.layouts.master')

{{-- import file css (private) --}}
@push('css')
<link rel="stylesheet" href="/admin/css/product/product-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
{{-- <script src="/admin/js/posts/post-list.js"></script> --}}
@endpush

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">List Products</li>
    </ol>
</nav>
{{-- form search --}}
@include('admin.products._search')

{{-- create post link --}}
{{-- case 1 --}}
<p><a class="btn btn-outline-success" href="{{ route('admin.product.create') }}">Create</a></p>

{{-- show message --}}
{{-- @if(Session::has('success'))
        <p class="text-success">{{ Session::get('success') }}</p>
@endif --}}

{{-- show error message --}}
@if(Session::has('error'))
<p class="text-danger">{{ Session::get('error') }}</p>
@endif

{{-- display list post table --}}
<table id="product-list" class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Images</th>
            <th>Prices</th>
            <th>Quantity</th>
            <th>Category_name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($products))
        @foreach ($products as $key => $product)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $product->name }}</td>
            <td>
                <img src="/{{ $product->thumbnail }}" alt="{{ $product->name }}" class="img-fluid" style="width: 80px; height: auto;">
            </td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->category->name }}</td>

            <td><a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-outline-info">Detail</a></td>
            <td><a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-outline-info">Edit</a></td>
            <td>
                <form action="{{ route('admin.product.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-outline-danger" onclick="return confirm('Are you sure DELETE PRODUCT?')" class="btn btn-danger" />
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

{{ $products->links() }}
@endsection