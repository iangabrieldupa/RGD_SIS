<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    protected $fillable = [
        'category_name',
        'category_status',
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
