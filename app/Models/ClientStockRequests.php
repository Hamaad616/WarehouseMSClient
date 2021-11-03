<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientStockRequests extends Model
{
    use HasFactory;
    protected $table ="client_stock_requests";

    protected $fillable = [
        'client_id', 'product_name', 'product_description', 'category_id', 'SKU_ID', 'SKU_BARCODE', 'product_reorder_level', 'product_retail_price', 'product_picture'
    ];

}
