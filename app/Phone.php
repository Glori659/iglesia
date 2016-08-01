<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';
    protected $fillable = [
        'id',
        'number',
        'type'
    ];
    public function person()
    {
        return $this->belongsToMany('App\Person','phone_person')->withPivot('person_id')->withTimestamps();
    }
}
