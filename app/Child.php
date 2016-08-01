<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $table = 'children';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [	'child_id',
                            'representative_id',
                            'type_relationship'];
    public function representative()
    {
        return $this->hasOne('App\Person','id','representative_id');
    }
    public function child()
    {
        return $this->hasOne('App\Person','id','child_id');
    }
    static function relationship($type_relationship,$gender)
    {
        if ('Hijo(a)'==$type_relationship) {
            if ($gender=="Masculino") {
                $relationship='Padre';
            }elseif($gender=="Femenino"){
                $relationship='Madre';
            }
        }elseif ('Sobrino(a)'==$type_relationship) {
            if ($gender=="Masculino") {
                $relationship='Tio';
            }elseif($gender=="Femenino"){
                $relationship='Tia';
            }
        }elseif ('Nieto(a)'==$type_relationship) {
            if ($gender=="Masculino") {
                $relationship='Abuela';
            }elseif($gender=="Femenino"){
                $relationship='Abuelo';
            }
        }else{
            $relationship=$type_relationship;
        }
        return $relationship;
    }
}
