<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * Get the rate record associated with the type.
     */
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }
}
