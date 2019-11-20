<?php

namespace App;

use App\Traits\Excludable;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use Excludable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'logo', 'app_key', 'secret_key',
    ];

    /**
     * Get the rate record associated with the courier.
     */
    public function rates()
    {
        return $this->hasOne('App\Rate');
    }
}
