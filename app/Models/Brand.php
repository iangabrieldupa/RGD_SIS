<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'product_brands';

    protected $fillable = [
        'brand_name',
        'brand_status',
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
