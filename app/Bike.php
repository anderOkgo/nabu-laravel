<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = ['invoice_path'];

    public function getUrlPathAttribute($path)
    {
        return \Storage::url($this->$path);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
