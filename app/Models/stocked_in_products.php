<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stocked_in_products extends Model
{
    use HasFactory;
    protected $table= 'item_stock';
    protected $primaryKey= 'its_id';
    protected $fillable = ['its_id','warehouse_id', 'grnd_id', 'product_id', 'rk_code', 'quantity', 'space_occupied', 'flag'];
}
