<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function brands(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function units(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
