<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
    public function placeType()
    {
        return $this->belongsTo(PlaceType::class);
    }
}
