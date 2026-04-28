<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'site_name', 'site_description', 'site_logo', 
        'facebook_url', 'line_id', 'maintenance_mode'
    ];
}