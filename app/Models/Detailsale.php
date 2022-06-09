<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailsale extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount_product_sold',
        'product',
        'sale',
    ];
}
