<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    use HasFactory;

    protected $table = 'urls';

    protected $fillable = ['original_url', 'shorten_url'];

    public function metrics()
    {
        return $this->hasMany(UrlMetric::class, 'url_id');
    }
}
