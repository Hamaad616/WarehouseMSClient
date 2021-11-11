@extends('layouts.app')
@section('content')

    <style>
        #wrapper {
            margin: 0 auto;
            padding: 0px;
            text-align: center;
            width: 995px;
        }

        #wrapper h1 {
            margin-top: 50px;
            font-size: 45px;
            color: #585858;
        }

        #wrapper h1 p {
            font-size: 20px;
        }

        #table_detail {
            width: 800px;
            text-align: left;
            border-collapse: collapse;
            color: #2E2E2E;
            border: #A4A4A4;
        }

        #table_detail tr:hover {
            background-color: lightcyan;
        }
        .badge{
            font-family: Arial, Helvetica, sans-serif !important;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <div class="row justify-content-center" style="margin-top: 5rem">
        <div class="col-md-8">
            <div id="table1" class="container table-responsive">

            </div>
        </div>


        <script>
            $('#my_products_settings').on('click', function (e) {
                e.preventDefault()
                $('#view').toggle("slide");
            });
        </script>

        <script>
            var rowCount = +$('#rowCount').val()
            for (let i = rowCount; i <= $('#recordVal').val(); i++) {
                $('#more_details' + i).click(function (e) {
                    e.preventDefault()
                    $('#hiddenRow' + i).toggle(5)
                    $('#icon'+i, this).toggleClass("bi bi-arrow-up bi bi-arrow-down");
                })
            }

            {{--var autoRefresh = setInterval(function (){--}}
            {{--    $('#table1').load('<?php echo url('/client/my-products/ajax')?>').fadeIn('slow')--}}
            {{--},1000)--}}
        </script>

@endsection
