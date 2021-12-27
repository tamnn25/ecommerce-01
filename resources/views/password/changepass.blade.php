@extends('layouts.master')

{{-- set page title --}}
@section('title', 'List Order')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Changepassword ')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'List Changepassword')

{{-- import file css (private) --}}
@push('css')
<link rel="stylesheet" href="css/changepassword/changepassword-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
<script src="js/changepassword/changepassword-list.js"></script>
@endpush

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        @if (!empty($users))
        @foreach ($users as $item )

        <div class="col-md-5 border-right">
            <form action="{{route('password.store', $item->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Update your profile</h4>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="first name" value="{{ $item->name }}"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Password</label><input type="password" name="password" class="form-control" placeholder="education" value="{{ $item->password }}"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Email</label><input type="text" name="email" class="form-control" placeholder="headline" value="{{ $item->email }}"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Address</label><input type="text" name="address" class="form-control" value="{{ $item->address }}" placeholder="state"></div>
                    </div>
                </div>
                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
            </form>
        </div>
        @endforeach

        @endif
    </div>
</div>
@endsection