<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'product_name',
        'main_price',
        'agent_price',
        'description',
        'status',
        'is_waiting_for_time',
        'start_booking_time',
        'product_code',
        'image',
        'rating',
    ];
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
