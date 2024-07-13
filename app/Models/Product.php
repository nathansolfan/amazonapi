<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // create model for product
    protected $fillable = ['name', 'description', 'price', 'asin'];

    public function priceHistories()
    {
        return $this->hasMany(PriceHistory::class);
    }
}
