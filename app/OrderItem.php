<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
        $this->belongsTo(Order::class);
    }
}
