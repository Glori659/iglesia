<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = ['name'];
    
    public function person()
    {
        return $this->belongsToMany('App\Person','profession_person')->withPivot('person_id')->withTimestamps();
    }
}
