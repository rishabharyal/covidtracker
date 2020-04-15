<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    protected $casts = ['metadata' => 'array'];
}
