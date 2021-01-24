<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temperature extends Model
{
    protected $fillable = [
        'val', 'created_at', 'updated_at',
    ];
}
