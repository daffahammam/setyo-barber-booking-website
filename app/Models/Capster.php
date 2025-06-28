<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capster extends Model
{
    protected $fillable = [
        'name',
        'position',
        'instagram',
        'photo'
    ];
}
