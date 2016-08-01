<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parishes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parish', 'municipality_id'];
    
    public function municipality(){
        return $this->belongsTo('App\Municipality');
    }
}
