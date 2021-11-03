<div class="container">
    <h4 class="ml-3"><a href="#" class="badge badge-primary">Bulk Update</a> <a href="{{ route('products.export') }}" class="badge badge-primary pl-2">Export</a></h4>

</div>
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
