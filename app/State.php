<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['state', 'iso_3166-2'];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function city()
    {
        return $this->belongsToMany('App\City');
    }
}
