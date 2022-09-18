@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: auto;

            /* margin-left: 20px; */
            text-align: center;
            font-family: arial;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover,
        a:hover {
            opacity: 0.7;
        }

        .right {
            float: right;
        }
    </style>
</head>

<body>

    @if(!empty($users))
    @foreach($users as $user)
    <div class="card">
        <img src="https://toigingiuvedep.vn/wp-content/uploads/2021/05/hinh-anh-avatar-de-thuong.jpg" alt="John" style="width:100%">
        <h3>{{$user->name }}</h3>
        <br>
        <h4>
            <p class="title" style="  font-family: fantasy;">Thành viên The An Stationery</p>
        </h4>
        <br>
        <h6><strong>Email : </strong> {{$user->email}}</h6>
        <br>
        <h6><strong>Số điện thoại: </strong>{{$user->phone_number}}</h6>

        <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>

        </div>
        <a href="{{route('password.password')}}"><button style="background-color:#FDD1D0; color: black">CẬP NHẬT HỒ SƠ</button></a></p>
    </div>
    @endforeach
    @endif

</body>

</html>
@endsection