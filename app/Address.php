<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [	'parish_id',
                            'city_id',
                            'type_address',
							'address'];
    public function city(){
		return $this->belongsTo('App\City');
    }
    public function parish(){
        return $this->belongsTo('App\Parish');
    }
    public function person()
    {
        return $this->belongsToMany('App\Person','address_person')->withPivot('person_id')->withTimestamps();
    }

}
