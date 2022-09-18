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
<div class="">
    <div class="row">
        @if (!empty($users))
        @foreach ($users as $item )

        <div class="col-lg-12">
            <form action="{{route('password.store', $item->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <h4>Cập nhật Profile</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="mt-3">
                            <label>Tên đăng nhập: </label>
                            <input type="text" class="form-control" placeholder="Tên đăng nhập" value="{{ $item->name }}">
                        </div>
                        <div class="mt-3">
                            <label>Mật khẩu: </label>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." value="{{ $item->password }}">
                        </div>
                        <div class="mt-3">
                            <label>Email: </label>
                            <input type="text" name="email" class="form-control"
                                placeholder="Email..." value="{{ $item->email }}">
                        </div>

                        <div class="mt-3">
                            <label>Địa chỉ: </label>
                            <input type="text" name="address" class="form-control" value="{{ $item->address }}" placeholder="Địa chỉ...">
                        </div>
                        <div class="mt-3">
                            <label>Số điện thoại: </label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $item->phone_number }}" placeholder="Số điện thoại...">
                        </div>
                        <button class="btn btn-danger mt-4" type="submit">Lưu thông tin</button>
                    </div>
                    <div class="col-6 mt-3">
                        <img class="ml-4 mt-3" src="https://toigingiuvedep.vn/wp-content/uploads/2021/05/hinh-anh-avatar-de-thuong.jpg" alt="" height="400px">
                    </div>  
                </div>    
            </form>
        </div>
        @endforeach

        @endif
    </div>
</div>
@endsection