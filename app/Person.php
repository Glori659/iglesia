<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'id','json','user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
