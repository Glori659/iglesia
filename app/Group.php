<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'type',
        'person_id'
    ];
    public function person()
    {
        return $this->belongsToMany('App\Person','group_person')->withPivot('group_id')->withTimestamps();
    }
    public function leader()
    {
        return $this->hasOne('App\Person','id','person_id');
    }

}
