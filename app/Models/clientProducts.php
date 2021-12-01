<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientProducts extends Model
{
    use HasFactory;

    protected $table = "product_item";
    protected $fillable = ['client_id', 'category_id', 'subcategory_id', 'unit_id', 'pitem_title', 'pitem_code', 'length', 'width', 'height', 'weight', 'img', 'in_code'];

}
