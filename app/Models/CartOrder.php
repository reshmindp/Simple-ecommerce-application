<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
    protected $primaryKey = 'cart_id';
    protected $fillable = ['order_id','product_id', 'quantity', 'amount', 'order_status', 'created_at', 'updated_at'];
}
