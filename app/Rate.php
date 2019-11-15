<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * Get the type that owns the rate.
     */
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    /**
     * Get the carrier that owns the rate.
     */
    public function carrier()
    {
        return $this->belongsTo('App\Carrier');
    }
}
