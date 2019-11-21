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
        'reply_id', 'user_id', 'message', 'file', 'status'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(InnerReply::class, 'reply_id');
    }
}
