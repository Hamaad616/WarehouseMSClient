<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
    body {
        background-color: #000
    }

    .padding {
        padding: 2rem !important
    }

    .card {
        margin-bottom: 30px;
        border: none;
        -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
    }

    .card-header {
        background-color: #fff;
        border-bottom: 1px solid #e6e6f2
    }

    h3 {
        font-size: 20px
    }

    h5 {
        font-size: 15px;
        line-height: 26px;
        color: #3d405c;
        margin: 0px 0px 15px 0px;
        font-family: 'Circular Std Medium'
    }

    .text-dark {
        color: #3d405c !important
    }

</style>
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <?php $count = 1; ?>
    @foreach ($stock_in_invoice as $sinvoice)
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block" href="{{ url('clients-home') }}" data-abc="true">Clients</a>
                <div class="float-right">
                    <h3 class="mb-0">Invoice #{{ $sinvoice->invoice_number }}</h3>
                    Date: {{ date('d-m-Y', strtotime($sinvoice->created_at)) }}
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <?php $warehouses = DB::table('clients')
                            ->join('Warehouses', 'Warehouses.wh_id', '=', 'clients.warehouse_id')
                            ->select('*')->where('sch_id', $client_id)
                            ->get(); ?>
                        @foreach ($warehouses as $warehouse)
                            <h5 class="mb-3">From:</h5>
                            <h3 class="text-dark mb-1">{{ $warehouse->wh_name }}</h3>
                            <div>{{ $warehouse->wh_address }}</div>
                            <div>Email: {{ $warehouse->wh_email }}</div>
                            <div>Contact: {{ $warehouse->wh_person }}</div>
                            <div>Phone: {{ $warehouse->wh_phone }}</div>
                        @endforeach
                    </div>
                    <div class="col-sm-6 ">
                        <?php $client_details = DB::select('select * from clients where sch_id = ?', [$client_id]); ?>
                        @foreach ($client_details as $client)
                            <h5 class="mb-3">To:</h5>
                            <h3 class="text-dark mb-1">{{ $client->sch_name }}</h3>
                            <div>{{ $client->designated_add_1 }}</div>
                            <div>{{ $client->designated_city }}</div>
                            <div>Email: {{ $client->client_email }}</div>
                            <div>Phone: <?php $client_other_detail = DB::select('select * from client_other_contact_details where client_id = ?', [$client_id]); ?> @foreach ($client_other_detail as $cod){{ $cod->client_cell }}@endforeach</div>
                        @endforeach
                    </div>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <h5 style="font-size: 1.5rem"> <b> Stock In Charges</b></h5>
                        <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="left">Product Name</th>
                            <th class="right">Space Occupied</th>
                            <th class="center">Qty</th>
                            <th class="center"><?php $client_flat = DB::select('select * from clients where sch_id = ?', [$client_id]); ?>@foreach ($client_flat as $isFl)
                                    @if ($isFl->storage_plan == 1)

                                        @if ($isFl->per_item_charge_flat == 111)
                                            @if ($isFl->flat_per_day == 1111)
                                                Flat Per Item Charge (Per Day)
                                            @endif

                                        @elseif ($isFl->flat_per_month == 2222)
                                            Flat Per Item Charge (Per Month)
                                        @endif

                                    @endif
                                @endforeach</th>
                            <th class="right">Sub-total</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td class="center"><?php echo $count; ?></td>
                            <td class="left strong">{{ $sinvoice->product_name }}</td>
                            <td class="left">{{ $sinvoice->space_occupied }} cuft</td>
                            <td class="right">{{ $sinvoice->quantity }}</td>
                            <td class="center"><?php $client_flat = DB::select('select * from clients where sch_id = ?', [$client_id]); ?>@foreach ($client_flat as $isFl)
                                    @if ($isFl->storage_plan == 1)

                                        @if ($isFl->per_item_charge_flat == 111)
                                            @if ($isFl->flat_per_day == 1111)
                                                {{ $isFl->per_item_charge_day }} Rs
                                            @endif

                                        @elseif ($isFl->flat_per_month == 2222)
                                            {{ $isFl->per_item_charge_month }} Rs
                                        @endif

                                    @endif
                                @endforeach</td>
                            <td class="right"> <b> {{ $sinvoice->subtotal }} Rs </b></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <br>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <h5 style="font-size: 1.5rem"> <b> Fulfillment Charges</b></h5>
                        <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="left">Product Name</th>
                            {{-- <th class="right">Space Occupied</th> --}}
                            <th class="center">Qty</th>
                            <th>Fulfillment Charge Applied</th>
                            <th class="center">Fulfillment Charge</th>
                            {{-- <th class="center"><?php $client_flat = DB::select('select * from clients where sch_id = ?', [$client_id]); ?>@foreach ($client_flat as $isFl) @if ($isFl->storage_plan == 1)

                                @if ($isFl->per_item_charge_flat == 111)
                                    @if ($isFl->flat_per_day == 1111)
                                        Flat Per Item Charge (Per Day)
                                    @endif

                                    @elseif ($isFl->flat_per_month == 2222)
                                    Flat Per Item Charge (Per Month)
                                @endif

                            @endif @endforeach</th> --}}
                            <th class="right">Sub-total</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr class="center">


                            <table>
                                <td>
                                    <center><span>No Fulfillment placed</span></center>
                                </td>
                            </table>

                            {{-- <td class="center"><?php echo $count; ?></td>
                            <td class="left strong">{{ $sinvoice->product_name }}</td>
                            <td class="left">{{ $sinvoice->space_occupied }} cuft</td>
                            <td class="right">{{$sinvoice->quantity }}</td>
                            <td class="right">{{ $sinvoice->product_in_charge }} Rs</td>
                            <td class="center"><?php $client_flat = DB::select('select * from clients where sch_id = ?', [$client_id]); ?>@foreach ($client_flat as $isFl) @if ($isFl->storage_plan == 1)

                                @if ($isFl->per_item_charge_flat == 111)
                                    @if ($isFl->flat_per_day == 1111)
                                        {{ $isFl->per_item_charge_day }} Rs
                                    @endif

                                    @elseif ($isFl->flat_per_month == 2222)
                                    {{ $isFl->per_item_charge_month}} Rs
                                @endif

                            @endif @endforeach</td>
                            <td class="right"> <b> {{ $sinvoice->subtotal }} Rs </b></td> --}}
                        </tr>




                        </tbody>
                    </table>
                </div>
                <br>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <h5 style="font-size: 1.5rem"> <b> Stock Out Charges</b></h5>
                        <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="left">Product Name</th>
                            <th class="right">Space Occupied</th>
                            <th class="center">Qty</th>
                            <th class="center">Inventory-out Charge</th>
                            {{-- <th class="center"><?php $client_flat = DB::select('select * from clients where sch_id = ?', [$client_id]); ?>@foreach ($client_flat as $isFl) @if ($isFl->storage_plan == 1)

                                @if ($isFl->per_item_charge_flat == 111)
                                    @if ($isFl->flat_per_day == 1111)
                                        Flat Per Item Charge (Per Day)
                                    @endif

                                    @elseif ($isFl->flat_per_month == 2222)
                                    Flat Per Item Charge (Per Month)
                                @endif

                            @endif @endforeach</th> --}}
                            <th class="right">Sub-total</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr class="center">


                            <table>
                                <td>
                                    <center><span>No Item Stocked Out</span></center>
                                </td>
                            </table>

                            {{-- <td class="center"><?php echo $count; ?></td>
                            <td class="left strong">{{ $sinvoice->product_name }}</td>
                            <td class="left">{{ $sinvoice->space_occupied }} cuft</td>
                            <td class="right">{{$sinvoice->quantity }}</td>
                            <td class="right">{{ $sinvoice->product_in_charge }} Rs</td>
                            <td class="center"><?php $client_flat = DB::select('select * from clients where sch_id = ?', [$client_id]); ?>@foreach ($client_flat as $isFl) @if ($isFl->storage_plan == 1)

                                @if ($isFl->per_item_charge_flat == 111)
                                    @if ($isFl->flat_per_day == 1111)
                                        {{ $isFl->per_item_charge_day }} Rs
                                    @endif

                                    @elseif ($isFl->flat_per_month == 2222)
                                    {{ $isFl->per_item_charge_month}} Rs
                                @endif

                            @endif @endforeach</td>
                            <td class="right"> <b> {{ $sinvoice->subtotal }} Rs </b></td> --}}
                        </tr>




                        </tbody>
                    </table>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>

                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Fulfillment Charges</strong>
                                </td>
                                <td class="right">0 Rs</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Stock Out Charges</strong>
                                </td>
                                <td class="right">0 Rs</td>
                            </tr>

                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Inventory in charge</strong>
                                </td>
                                <td class="right">
                                    {{ $sinvoice->product_in_charge }} Rs
                                </td>
                            </tr>

                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Minimum Charge Per Month</strong>
                                </td>
                                <td class="right"> <?php $client_minimum_per_month = DB::select('select minimum_per_month from clients where sch_id = ?', [$client_id]); ?> @foreach ( $client_minimum_per_month as $client_minimum) <b>{{ $client_minimum->minimum_per_month }}  Rs</b> @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Subtotal</strong>
                                </td>
                                <td class="right">{{ $sinvoice->subtotal }} Rs</td>
                            </tr>

                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Total</strong>
                                </td>
                                <td class="right">
                                    <strong class="text-dark">{{ $sinvoice->subtotal }} Rs</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">WarehouseMS</p>
            </div>
        </div>
    @endforeach
</div>
