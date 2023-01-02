<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'bill_no',
        'product_id',
        'gross_amount',
        'service_charge',

        'net_amount',
        'discount',
        'post_status',
    ];

    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
