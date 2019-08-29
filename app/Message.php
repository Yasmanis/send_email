<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_id','recipient_id','body'];

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }
}
