<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['item_name', 'category_id', 'price', 'status', 'is_featured', 'description'];
}
