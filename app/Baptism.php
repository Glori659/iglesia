<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baptism extends Model
{
    protected $table = 'baptisms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [	'date_baptisms',
                            'status',
                            'person_id'];
    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
