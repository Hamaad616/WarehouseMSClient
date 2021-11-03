@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <style>
        .card {
            margin: 5px 5px;
        }
    </style>

    <div class="container">
        <div class="row ">
            {{--        <div class="col-md-8">--}}
            {{--            <div class="card">--}}
            {{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

            {{--                <div class="card-body">--}}
            {{--                    @if (session('status'))--}}
            {{--                        <div class="alert alert-success" role="alert">--}}
            {{--                            {{ session('status') }}--}}
            {{--                        </div>--}}
            {{--                    @endif--}}

            {{--                        @if (session('message'))--}}
            {{--                            <div class="alert alert-success" role="alert">--}}
            {{--                                {{ session('message') }}--}}
            {{--                            </div>--}}
            {{--                        @endif--}}


            {{--                    {{ __('You are logged in as Admin!') }}--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}


            <div class="col-md-12">
                <div class="row justify-content-center">

                    <div class="card" style="width: 20rem;">
                        <center><i class="bi-box-arrow-in-down" style="font-size: 10rem"></i></center>
                        <div class="card-body">
                            <h5 class="card-title"> {{ strtoupper('Request a Product Creation') }}</h5>
                            <p class="card-text">Request a new product creation</p>
                            <a id="request_create" class="btn btn-success">Create Product</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <script>

        $('#request_create').on('click', function (event) {
            event.preventDefault();
            window.location.href = "/client/request/product-in";
        });

    </script>
@endsection
