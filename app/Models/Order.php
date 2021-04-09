<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        "orderNumber",
        "orderDate",
        "requiredDate",
        "shippedDate",
        "status",
        "comments",
        "customerNumber",
        "orderNumber"
    ];

    public function details(){
        return $this->hasOne(OrderDetails::class, 'orderNumber', 'orderNumber');
    }
}
