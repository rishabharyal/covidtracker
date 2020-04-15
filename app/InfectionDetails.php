<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectionDetails extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function infectedPlace()
    {
        return $this->belongsTo(InfectedPlace::class);
    }
}
