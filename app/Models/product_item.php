<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_item extends Model
{
    use HasFactory;

    protected $table = "product_item";
     protected $fillable = ['pitem_id', 'client_id', 'category_id', 'item_id', 'pitem_title', 'pitem_code', 'length', 'width', 'height', 'img', 'in_code'];
}
