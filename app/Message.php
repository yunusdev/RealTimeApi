<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    public $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function talk()
    {
        return $this->belongsTo(Talk::class);
    }
}
