<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'orderdetails';

    protected $fillable = [
        "orderNumber",
        "productCode",
        "quantityOrdered",
        "priceEach",
        "orderLineNumber",
        "orderNumber",
        "productCode"
    ];
}
