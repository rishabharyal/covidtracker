<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectedPlace extends Model
{

    protected $casts = ['metadata' => 'array'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
