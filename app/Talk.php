<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    //

    public $guarded = [];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
