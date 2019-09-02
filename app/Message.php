<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['conversation_id','sender_id','recipient_id','asunto','body','body_min','token'];

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }
}
