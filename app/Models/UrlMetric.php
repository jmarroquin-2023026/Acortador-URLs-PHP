<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlMetric extends Model
{
    protected $fillable = [
        'url_id',
        'ip_address',
        'user_agent',
    ];
}
