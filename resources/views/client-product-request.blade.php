@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <style>
        .card {
            margin: 5px 5px;
        }

        span {
            display: none;
        }

    </style>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light p-4 rounded shadow-lg p-3 mb-5">
                <h5 class="text-center mb-2 p-2 rounded lead">Product Creation</h5>

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('danger'))
                    <div class="alert alert-success">
                        {{ session()->get('danger') }}
                    </div>
                @endif

                <div class="progress-bar bg-primary rounded mb-3" role="progressbar" style="width: 20%; height: 40px"
                     id="progressBar">
                    <b class="lead" id="progressText">Step-1</b>
                </div>

                <form method="POST" action="{{route('client.stock-request')}}" id="form-data" class="pt-2"
                      enctype="multipart/form-data">
                    @csrf
                    <input id="client_id" name="client_id" type="hidden" value="{{session('id')}}">
                    <div id="first">
                        <div id="step_1_validation" style="display: none" class="alert alert-danger" role="alert">
                            Please fill out the form
                        </div>
                        <h4 class="text-center bg-primary p-1 rounded text-light">Product Details</h4>
                        <div class="form-group">
                            <label for="product_name">Product Name </label>
                            <input type="text" id="product_name" name="product_name" class="form-control"
                                   placeholder="Product Name">
                            <span class="error_form" id="fname_error_message"></span>
                        </div>

                        <div class="form-group">

                            <label for="">Select Product Category</label>
                            <select class="form-control" name="category_select" id="select_category">
                                <option value="0" selected="selected">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            <span class="error_form" id="category_error_message"></span>

                        </div>

                        <div class="form-group">
                            <label for="product_description">Product Description</label>
                            <textarea type="text" id="product_description" name="product_description"
                                      class="form-control"
                                      placeholder="Product Description"> </textarea>
                            <span class="error_form" id="product_desc_error_message"></span>

                        </div>

                        <div class="form-group">
                            <button id="step_1" type="button" class="btn btn-primary btn-lg btn-block">Next</button>
                        </div>

                    </div>


                    <div id="second" style="display: none">
                        <div id="step_2_validation" style="display: none" class="alert alert-danger" role="alert">
                            Please fill out the form
                        </div>
                        <h4 class="text-center bg-primary p-1 rounded text-light">Product Details</h4>
                        <div class="form-group">
                            <label for="product_SKUID">SKU ID</label>
                            <input type="number" id="product_SKUID" class="form-control" name="product_SKUID">
                            <span class="error_form" id="skuid_error_message"></span>
                        </div>

                        <div class="form-group">
                            <label for="product_SKUBCD">SKU BARCODE</label>
                            <input type="number" class="form-control" id="product_SKUBCD" name="product_SKUBCD">
                            <span class="error_form" id="skubcd_error_message"></span>
                        </div>

                        <div class="form-group">
                            <label for="product_reorder">Product Reorder Level</label>
                            <input type="number" id="product_reorder" class="form-control" name="product_reorder">
                            <span class="error_form" id="reorder_error_message"></span>
                        </div>

                        <div class="form-group">
                            <label for="product_retail_price">Product Retail Price</label>
                            <input type="number" id="product_retail_price" class="form-control"
                                   name="product_retail_price">
                            <span class="error_form" id="price_error_message"></span>
                        </div>

                        <div class="btn-group">
                            <button id="previous_2" type="button" class="btn btn-danger btn-lg">Previous</button>
                            <button id="next_2" type="button" class="btn btn-success btn-lg">Next</button>
                        </div>

                    </div>

                    <div id="third" style="display: none">
                        <h4 class="text-center bg-primary p-1 rounded text-light">Product Specification</h4>

                        <div class="form-group">
                            <label for="product_length">Product length (Inches)</label>
                            <input class="form-control" id="product_length" min="0" type="number" name="product_length">

                        </div>

                        <div class="form-group">
                            <label for="product_width">Product Width (Inches)</label>
                            <input class="form-control" id="product_width" min="0" type="number" name="product_width">
                        </div>

                        <div class="form-group">
                            <label for="product_height">Product Height (Inches)</label>
                            <input class="form-control" id="product_height" min="0" type="number" name="product_height">
                        </div>

                        <div class="form-group">
                            <label for="product_weight">Product Weight (grams)</label>
                            <input class="form-control" id="product_weight" min="0" type="number" name="product_weight">
                        </div>

                        <div class="form-group">
                            <label for="product_SKUBCD">Product Picture</label>
                            <input type="file" id="product_picture" class="form-control-file" name="product_picture"
                                   onblur="check_file()">
                            <span class="error_form" id="picture_error_message"></span>
                        </div>

                        <div class="btn-group">
                            <button id="previous_3" type="button" class="btn btn-danger btn-lg">Previous</button>
                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>
                    </div>


                </form>


            </div>

        </div>
    </div>

    <script>

        $('#request_in').on('click', function (event) {
            event.preventDefault();
            window.location.href = "/request/product-in";
        });


        $('#step_1').click(function (e) {
            e.preventDefault();
            let desc = $('#product_description').val()
            let sel_val = +$('#select_category').val()
            console.log(sel_val)
            $("#first").find("input[type = 'text']").each(function () {

                if (this.value === "") {
                    alert("You must fill in all inputs on the form");
                } else if (sel_val === 0) {
                    $('#step_1_validation').show()
                    $('#first').show()
                } else if (desc === " ") {
                    $('#step_1_validation').show()
                    $('#first').show(800)
                } else {
                    $('#step_1_validation').hide()
                    $('#first').hide()
                    $("#second").show(800)
                    // $('#second').show()
                    $('#progressBar').css('width', '60%')
                    $('#progressText').text('Step - 2')
                }
            });


            //
            // $('#first').hide();

        });

        $('#previous_2').click(function (e) {
            e.preventDefault();
            $('#second').hide();
            $("#first").show(800)
            $('#progressBar').css('width', '20%')
            $('#progressText').text('Step - 1')
        });

        $('#next_2').click(function (e) {
            e.preventDefault();
            $("#second").find("input[type = 'number']").each(function () {
                if (this.value === "") {
                    $('#step_2_validation').show()
                    $('#second').show()
                } else {
                    $('#step_2_validation').hide()
                    $('#second').hide();
                    $('#progressBar').css('width', '100%')
                    $('#progressText').text('Step - 3')
                    $('#progressBar').addClass('bg-success')
                    $('#progressBar').remove('bg-primary')
                    $('#third').show(800)

                }
            });
        });

        $('#previous_3').click(function (e) {
            e.preventDefault();
            $('#third').hide();
            $("#second").show(800)
            $('#progressBar').css('width', '60%')
            $('#progressText').text('Step - 2')
        });


        $("#fname_error_message").hide();
        $("#product_desc_error_message").hide();
        $("#category_error_message").hide();
        $("#reorder_error_message").hide();
        $("#price_error_message").hide();
        $("#skuid_error_message").hide();
        $("#skubcd_error_message").hide();
        $("#picture_error_message_error_message").hide();

        var error_fname = false;
        var error_sname = false;
        var error_email = false;
        var error_password = false;
        var error_retype_password = false;

        $("#product_name").focusout(function () {
            check_fname();
        });

        $("#select_category").focusout(function () {
            check_category();
        });
        $("#product_SKUID").focusout(function () {
            check_SKUID();
        });
        $("#product_SKUBCD").focusout(function () {
            check_SKUBCD()
        });
        $("#product_retail_price").focusout(function () {
            check_retail()
        });
        $("#product_reorder").focusout(function () {
            check_reorder()
        });
        $("#product_picture").focusout(function () {
            check_file()
        });

        function check_fname() {

            var fname = $("#product_name").val();
            if (fname !== '') {
                $("#fname_error_message").hide();
                $("#product_name").css("border", "2px solid #34F458");
            } else {
                $("#fname_error_message").html("Should contain only Characters");
                $("#fname_error_message").show();
                $("#product_name").css("border", "2px solid #F90A0A");
                error_fname = true;
            }
        }


        function check_SKUID() {
            var pattern = /^\d+$/;
            var fname = $("#product_SKUID").val();
            if (pattern.test(fname) && fname !== '') {
                $("#skuid_error_message").hide();
                $("#product_SKUID").css("border", "2px solid #34F458");
            } else {
                $("#skuid_error_message").html("Should contain only Numbers");
                $("#skuid_error_message").show();
                $("#product_SKUID").css("border", "2px solid #F90A0A");
                error_fname = true;
            }
        }

        function check_SKUBCD() {
            var pattern = /^\d+$/;
            var fname = $("#product_SKUBCD").val();
            if (pattern.test(fname) && fname !== '') {
                $("#skubcd_error_message").hide();
                $("#product_SKUBCD").css("border", "2px solid #34F458");
            } else {
                $("#skubcd_error_message").html("Should contain only Numbers");
                $("#skubcd_error_message").show();
                $("#product_SKUBCD").css("border", "2px solid #F90A0A");
                error_fname = true;
            }
        }

        function check_reorder() {
            var pattern = /^\d+$/;
            var fname = $("#product_reorder").val();
            if (pattern.test(fname) && fname !== '') {
                $("#reorder_error_message").hide();
                $("#product_reorder").css("border", "2px solid #34F458");
            } else {
                $("#reorder_error_message").html("Should contain only Numbers");
                $("#reorder_error_message").show();
                $("#product_reorder").css("border", "2px solid #F90A0A");
                error_fname = true;
            }
        }

        function check_retail() {
            var pattern = /^\d+$/;
            var fname = $("#product_retail_price").val();
            if (pattern.test(fname) && fname !== '') {
                $("#price_error_message").hide();
                $("#product_retail_price").css("border", "2px solid #34F458");
            } else {
                $("#price_error_message").html("Should contain only Numbers");
                $("#price_error_message").show();
                $("#product_retail_price").css("border", "2px solid #F90A0A");
                error_fname = true;
            }
        }

        function check_file() {

            $("#product_picture").change(function () {
                var fileExtension = ['jpeg', 'jpg', 'png'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) === -1) {
                    $("#picture_error_message").html("Only formats are allowed : " + fileExtension.join(', '));
                    $("#picture_error_message").show()
                    $("#product_picture").css("border", "2px solid #F90A0A")
                    error_fname = true;
                } else {
                    $("#picture_error_message").hide()
                    $("#product_picture").css("border", "2px solid #34F458");
                }
            })

        }


        function check_category() {
            $("#select_category").on('change', function (e) {
                e.preventDefault();
                var val = +$(this).val();
                if (val === 0) {
                    $("#category_error_message").html("Please select the category");
                    $("#category_error_message").show();
                    $("#select_category").css("border", "2px solid #F90A0A");
                    error_fname = true;
                } else {
                    $("#category_error_message").hide();
                    $("#select_category").css("border", "2px solid #34F458");
                }
            })
        }


        $("#registration_form").submit(function () {
            error_fname = false;

            check_fname();
            check_SKUID()
            check_retail()
            check_reorder()
            check_category()
            check_file()
            check_SKUID()
            check_SKUBCD()

            if (error_fname === false && error_sname === false && error_email === false && error_password === false && error_retype_password === false) {
                alert("Registration Successful");
                return true;
            } else {
                alert("Please Fill the form Correctly");
                return false;
            }


        });

    </script>


@endsection
