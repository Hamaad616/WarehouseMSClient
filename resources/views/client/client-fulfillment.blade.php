@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>





    <div class="card shadow-lg p-3 mb-5 bg-body rounded border-0">
        <div class="card-body">

            <form id="fulfillment-form" method="POST" enctype="multipart/form-data" >
                @csrf
                <input id="client_id" type="hidden" value="{{ $client_id }}">

                <div class="row">
                    <div class="col-lg-8">
                        <br>
                        <br>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="v_id"> Session</label>
                        <select type="text" class="form-control" id="session_id " name="session_id">
                            @foreach ($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->session_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive" id="style-1">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>

                                    <td>

                                        <label class="control-label" for="v_id">Client</label>
                                        <select type="text" class="form-control" name="client_id" id="client_id"
                                                required="required">
                                            <!--                                                        <option value="0">Select school</option>';-->
                                            @foreach ($client_name as $client)
                                                <option value="{{ $client->sch_id }}">{{ $client->sch_name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        <label class="control-label">Mode</label>
                                        <select type="text" class="form-control" name="mode" id="mode" tabindex="8"
                                                required="required">

                                            <option value="1" selected="selected">By Hand</option>
                                            <option value="2">Courier</option>

                                        </select>

                                    </td>

                                    <td>
                                        <label class="control-label" for="v_id">Warehouse</label>
                                        <select type="text" class="form-control" name="wh_id" id="wh_id" tabindex="8"
                                                required="required">
                                            <?php $wh = DB::table('clients')
                                                ->where('sch_id', '=', $client_id)
                                                ->pluck('warehouse_id'); ?>
                                            <?php $warehouse_name = DB::table('Warehouses')
                                                ->where('wh_id', $wh)
                                                ->get(); ?>
                                            @foreach ($warehouse_name as $warehouse)
                                                <option value="{{ $warehouse->wh_id }}">{{ $warehouse->wh_name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        <label class="control-label " for="">Delivery Date</label>
                                        <input type="date" name="date" min="1000-01-01" max="3000-12-31"
                                               class="form-control">

                                    </td>
                                    <td>
                                        <label class="control-label " for="">P/O &nbsp; / &nbsp; Acknowledgment
                                            #</label>
                                        <input class="form-control" name="po" id="po" required="required" value=""
                                               spellcheck="false" data-ms-editor="true">

                                        <label class="control-label" style="display: none" id="courierSelect">Select
                                            Courier</label>
                                        <select type="text" class="form-control" name="couriers" id="couriers"
                                                tabindex="8" required="required" style="display: none">

                                            @foreach ($couriers as $courier)
                                                <option value="{{ $courier->id }}">{{ $courier->courier_name }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </td>



                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <label class="control-label " for="">Remarks/Comments</label>
                                        <textarea class="form-control" name="remarks" id="remarks"
                                                  placeholder=" Write remarks...." spellcheck="false"
                                                  data-ms-editor="true"> </textarea>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <br><br>

                            <div class="row">
                                <div class="col-lg-9"><br><br><br></div>
                                <div class="col-lg-3"><input id="search_product" type="number" class="form-control"
                                                             placeholder="Search product by barcode"></div>
                            </div>

                            <div class="row justify-content-center">
                                <div id="searchResults" class="card shadow-lg p-3 mb-5 bg-body rounded border-0 col-lg-8"
                                     style="display: none">

                                    <a id="search-result" style="cursor: pointer">
                                        <table class="table table-borderless" id="search-table">
                                            <thead>
                                            <tr>
                                                <th><label for="p_code" class="label-control"> Product Code </label>
                                                </th>
                                                <th><label for="p_name"> Product Name </label></th>
                                            </tr>
                                            </thead>

                                            <tbody>


                                            <tr>
                                                <td>
                                                    <input type="text" name="product_code_search"
                                                           id="product_code-search" class="form-control" value=""
                                                           readonly>
                                                </td>

                                                <td>
                                                    <input type="text" name="product_name_search"
                                                           id="product_name-search" class="form-control" value=""
                                                           readonly>
                                                </td>

                                            </tr>





                                            </tbody>

                                        </table>
                                    </a>


                                </div>

                            </div>



                            <div id="div1" style="display: none">
                                <div class="div1 table-responsive">
                                    <table class="table table-borderless" id="dynamic_table">
                                        <thead>
                                        <tr>
                                            <th><label for="p_code" class="label-control"> Product Code </label>
                                            </th>
                                            <th><label for="p_name"> Product Name </label></th>
                                            <th><label for="p_quantity">Quantity</label></th>
                                            <th><label for="action">Action</label></th>
                                        </tr>
                                        </thead>

                                        <tbody>




                                        </tbody>

                                    </table>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>

                <div class="d-grid gap-2 mt-2">
                    <button class="btn btn-success" type="success">Submit</button>
                </div>

            </form>
        </div>
    </div>

    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>

    {{-- <script>
        $(document).ready(function() {
            var client_id = $('#client_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '{{ route('client.all-products') }}',
                data: {
                    client_id: client_id
                },
                success: function(response) {
                    for (let i = 0; i < response.details.length; i++) {
                        $('#dynamic-table tbody').find('#product_code').val(response.details[i]
                            .pitem_code)
                        $('#dynamic-table tbody').find('#product_name').val(response.details[i]
                            .pitem_title)
                    }
                }

            }, 'json')
        })
    </script> --}}

    <script>
        $('#fulfillment-form').on('submit', function(e) {
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url: '{{ route('client.create-fulfillment') }}',
                method: "GET",
                data: $('#fulfillment-form').serialize(),
                success: function(response) {
                    if(response.code === 1){
                        toastr.success(response.msg)
                        $('#fulfillment-form')[0].reset()
                    }
                    else{
                        toastr.error(" Something went wrong! ")
                    }
                }
            })
        })
    </script>

    <script>
        $('#search_product').on('change', function() {
            var search_code = $(this).val()
            if (search_code == "") {
                $('#searchResults').css('display', 'none')
            } else {
                var client_id = $('#client_id').val()
                $.ajax({
                    url: '{{ route('searchProduct') }}',
                    method: 'get',
                    data: {
                        search_code: search_code,
                        client_id: client_id
                    },
                    success: function(response) {
                        console.log(response.details)
                        $('#searchResults').css('display', 'block')
                        for (let i = 0; i <= response.details.length; i++) {
                            $('#product_code-search').val(response.details[i]
                                .pitem_code)
                            $('#product_name-search').val(response.details[i]
                                .pitem_title)
                        }
                    }
                })
            }
        })

        $(document).on('click', '#search-result', function(e) {
            $('#div1').show()
            $('#searchResults').css('display', 'none')
            var product_code = $('#product_code-search').val()
            var product_name = $('#product_name-search').val()
            var totalRowCount = dynamic_table.rows.length;
            console.log(totalRowCount)

            for (let index = totalRowCount; index >= totalRowCount; index--) {
                $('#dynamic_table > tbody').append(
                    '<tr id="row' + index +
                    '"> <td><input type="text" name="product_code[]" id="product_code" class="form-control" value="' +
                    product_code +
                    '" readonly></td> <td><input type="text" name="product_name[]" id="product_name' + index +
                    '" class="form-control" value="' +
                    product_name +
                    '" readonly></td><td><input type="number" min="0" name="product_quantity[]" id="product_quantity' +
                    index + '" class="form-control" value="0"></td> <td> <a id="' + index +
                    '" href="javascript:void(0);" class="remCF btn btn-danger">X</a> </td> </tr>'
                )

            }

        })
    </script>

    <script>
        $(document).on('click', '.remCF', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            var totalRowCount = dynamic_table.rows.length;
            if (totalRowCount === 1) {
                $('#div1').css('display', 'none')
            }
        })
    </script>


    <script>
        $(document).on('change', '#mode', function() {

            var mode_val = +$(this).val()
            if (mode_val === 2) {
                $('#courierSelect').show()
                $('#couriers').show()
            } else {
                $('#courierSelect').css('display', 'none')
                $('#couriers').css('display', 'none')
            }
        })
    </script>



@endsection
