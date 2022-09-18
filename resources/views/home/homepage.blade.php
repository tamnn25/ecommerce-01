    @section('content')
    @extends('layouts.master')
    @include('layouts.menu_left')

    <!-- SUB -->
    <div class="">
        <img src="shop/img/banner/SUB1.PNG" style="margin-bottom: -50px; height: 57px">
    </div>
    <!-- end sub -->
    <section class="featured spad">
        @include('home.listproduct')
    </section>
    <!-- Featured End -->
    </section>
    <!-- Blog Begin -->
    <section>
        @include('blog.blog')
    </section>
    <!-- Blog Section End -->
    @endsection
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
    </style>

    @push('css')

    <link rel="stylesheet" href="{{'shop/css/rating.css' }}">

    @endpush
    @push('js')

    @endpush