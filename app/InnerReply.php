<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InnerReply extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'user_id', 'message', 'file', 'status'
    ];
}
