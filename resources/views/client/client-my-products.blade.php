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

<div class="container">
    <h4 class="ml-3"><a href="#" class="badge badge-primary">Bulk Update</a> <a href="{{ route('products.export') }}" class="badge badge-primary pl-2">Export</a></h4>

<table border=1 id="table_detail" align=center cellpadding=10>

    <tr>
        <th>Sr#</th>
        <th>Product Picture</th>
        <th>Product Name</th>
        <th>Product Category</th>
        <th></th>
    </tr>
    <?php $count = 1;?>
    <input id="recordVal" type="hidden" value="{{count($products)}}">
    @foreach($products as $product)

        <tr>
            <td><?php echo $count; ?></td>
            <input id="rowCount" type="hidden" value="<?php echo $count;?>">
            <input id="hiddenRowCount" type="hidden" value="<?php echo $count;?>">
            <td><img src="{{ asset('uploads/'. $product->img) }}" alt="{{$product->pitem_title}}">
            </td>
            <td>{{$product->pitem_title}}</td>
            <td>@foreach($category as $cat){{$cat->category_name}}@endforeach</td>
            <td>
                <a href="#" id="more_details<?php echo $count;?>">Show more details <i id="icon<?php echo $count;?>"
                                                                                       class="bi bi-arrow-down"></i> </a>
            </td>
        </tr>
        <tr style="display: none" id="hiddenRow<?php echo $count;?>" class="hidden_row">
            <td colspan=5>
                <span class="badge badge-secondary">Barcode {{$product->pitem_code}}</span> <span
                    class="badge badge-danger">Dimension: {{round(($product->length * $product->width * $product->height)/(1728), 2)}} cubic ft.</span>
            </td>
        </tr>

        <?php $count++;?>
    @endforeach
</table>
<br>
<div class="text-center">{{$products->links()}}</div>
<br><br><br>

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
