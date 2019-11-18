<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['collection_date'];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the invoice record associated with the order.
     */
    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }

    /**
     * Get the order item record associated with the order.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
