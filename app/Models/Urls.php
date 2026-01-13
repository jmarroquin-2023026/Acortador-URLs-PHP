<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Urls extends Model
{
    use HasFactory;

    protected $table='urls';

    protected $fillable=['original_url','shorten_url'];
}
