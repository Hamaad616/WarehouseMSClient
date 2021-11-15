@extends('layouts.app')
@section('content')


    <div class="row justify-content-center">

        <div class="card">
            <h5 class="card-header">Invoices</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice#</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Rack code</th>
                                <th>Space Occupied (cuft)</th>
                                <th>Quantity</th>
                                <th>Created at</th>
                                <th>View Invoice</th>
                            </tr>
                        </thead>

                        <?php $count = 1; ?>
                        <tbody>
                        @foreach ($stock_in_bill as $bill)
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td>{{ $bill->invoice_number }}</td>
                                <td>{{ $bill->product_code }}</td>
                                <td>{{ $bill->product_name }}</td>
                                <td>{{ $bill->rack_code }}</td>
                                <td>{{ $bill->space_occupied }}</td>
                                <td>{{ $bill->quantity }}</td>
                                <?php $timestamp = strtotime($bill->created_at); ?>
                                <td>{{ date("m/d/Y m:h:s", $timestamp) }}</td>
                                <td><a href="{{ route('invoice.generate', ['client_id' => $client_id, 'created_at' => $bill->created_at]) }}" class="btn btn-primary"> <i class="bi bi-receipt"></i> </a></td>
                            </tr>
                        <?php $count++; ?>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection
