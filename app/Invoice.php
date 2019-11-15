<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * Get the order that owns the invoice.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
