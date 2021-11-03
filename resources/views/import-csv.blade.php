@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <h4 class="card-header">Insert File</h4>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <span>{{session('success')}}</span>
                        </div>
                    @endif

                    <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <input class="form-control-file" type="file" name="file">
                    <button class="btn btn-outline-primary btn mt-2" type="submit" style="float: right">Upload</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
