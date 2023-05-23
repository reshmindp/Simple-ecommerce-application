<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    protected $fillable = ['order_number','customer_name','phone_number', 'net_amount', 'order_date','created_at', 'updated_at'];
}
