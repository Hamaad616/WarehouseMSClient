@extends('layouts.app')
@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">


    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



    <div class="row justify-content-center">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#nav_tab_1">All Products <span
                            class="text-primary">{{ count($requested_products) }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#nav_tab_2">Pending <span
                            class="text-danger">{{ count($pending_requested_products) }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#nav_tab_3">Approved <span
                            class="text-success">{{ count($approved_requested_products) }}</span></a>
                </li>
            </ul>

            <div class="tab-content">

                <div id="nav_tab_1" class="container mt-5 tab-pane fade show active">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Category Name</th>
                                        <th>SKU Id</th>
                                        <th>SKU Barcode</th>
                                        <th>Product Reorder Level</th>
                                        <th>Product Retail Price</th>
                                        <th>Product Dimensions</th>
                                        <th>Product Weight</th>
                                        <th>Product Picture</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <?php $count = 1; ?>
                                    <tbody>
                                    @foreach($requested_products as $products)
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td>{{$products->product_name}}</td>
                                            <td>{{ $products->product_description }}</td>
                                            <td>@foreach($category as $cat) {{ $cat->category_name }} @endforeach</td>
                                            <td>{{$products->SKU_ID}}</td>
                                            <td>{{ $products->SKU_BARCODE }}</td>
                                            <td>{{ $products->product_reorder_level }}</td>
                                            <td>{{ $products->product_retail_price }}</td>
                                            <td>{{ round(($products->product_length * $products->product_width * $products->product_height)/1728, 2) }}
                                                cuft.
                                            </td>
                                            <td>{{ $products->weight }}</td>
                                            <td><img style="width: 50px; height: 60px" src="{{ asset('uploads/'.$products->product_picture) }}"
                                                     alt="{{ $products->product_name }}"></td>
                                            <td>@if($products->status == 0) <h5><span class="badge badge-warning">Under Review</span>@elseif($products->status == 1) <span class="badge badge-success">Approved</span> @else <span class="badge badge-danger">Not <Approved></Approved></span></h5>@endif</td>
                                        </tr>
                                        <?php $count++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div id="nav_tab_2" class="container tab-pane fade mt-5">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Category Name</th>
                                        <th>SKU Id</th>
                                        <th>SKU Barcode</th>
                                        <th>Product Reorder Level</th>
                                        <th>Product Retail Price</th>
                                        <th>Product Dimensions</th>
                                        <th>Product Weight</th>
                                        <th>Product Picture</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <?php $count = 1; ?>
                                    <tbody>
                                    @foreach($pending_requested_products as $products)
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td>{{$products->product_name}}</td>
                                            <td>{{ $products->product_description }}</td>
                                            <td>@foreach($category as $cat) {{ $cat->category_name }} @endforeach</td>
                                            <td>{{$products->SKU_ID}}</td>
                                            <td>{{ $products->SKU_BARCODE }}</td>
                                            <td>{{ $products->product_reorder_level }}</td>
                                            <td>{{ $products->product_retail_price }}</td>
                                            <td>{{ round(($products->product_length * $products->product_width * $products->product_height)/1728, 2) }}
                                                cuft.
                                            </td>
                                            <td>{{ $products->weight }}</td>
                                            <td><img src="{{ asset('uploads/'.$products->product_picture) }}"
                                                     alt="{{ $products->product_name }}"></td>
                                            <td>@if($products->status == 0) <h5><span class="badge badge-warning">Under Review</span></h5>@endif</td>
                                        </tr>
                                        <?php $count++; ?>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="nav_tab_3" class="container tab-pane fade mt-5">
                        <div class="card">
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Category Name</th>
                                        <th>SKU Id</th>
                                        <th>SKU Barcode</th>
                                        <th>Product Reorder Level</th>
                                        <th>Product Retail Price</th>
                                        <th>Product Dimensions</th>
                                        <th>Weight</th>
                                        <th>Product Picture</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <?php $count = 1; ?>
                                    <tbody>
                                    @foreach($approved_requested_products as $products)
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td>{{$products->product_name}}</td>
                                            <td>{{ $products->product_description }}</td>
                                            <td>@foreach($category as $cat) {{ $cat->category_name }} @endforeach</td>
                                            <td>{{$products->SKU_ID}}</td>
                                            <td>{{ $products->SKU_BARCODE }}</td>
                                            <td>{{ $products->product_reorder_level }}</td>
                                            <td>{{ $products->product_retail_price }}</td>
                                            <td>{{ round(($products->product_length * $products->product_width * $products->product_height)/1728, 2) }}
                                                cuft.
                                            </td>
                                            <td>{{ $products->weight }}</td>
                                            <td><img src="{{ asset('uploads/'.$products->product_picture) }}"
                                                     alt="{{ $products->product_name }}"></td>
                                            <td>@if($products->status == 0) <h5><span class="badge badge-warning">Under Review</span>
                                                </h5>@endif</td>
                                        </tr>
                                        <?php $count++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                $("#myTab a").click(function (e) {
                    e.preventDefault();
                    $(this).tab("show");
                });
            });
        </script>

@endsection
