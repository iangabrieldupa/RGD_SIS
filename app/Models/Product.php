<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'sku',
        'product_unit_price',
        'quantity',
        'product_image',
        'product_description',
        'brand_id',
        'category_id',
        'unit_id',
        'vat_type',
    ];
}
