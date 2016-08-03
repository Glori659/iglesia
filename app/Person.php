<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table = 'people';
    protected $fillable = [
        'id',
        'name_first',
        'name_last',
        'date_birth',
        'nationality',
        'identity_document',
        'gender',
        'email',
        'user_id',
        'observations',
        'qualities',
        'question'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function baptism()
    {
        return $this->hasOne('App\Baptism','person_id');
    }
    public function representative()
    {
        return $this->belongsTo('App\Child','id','representative_id');
    }
    public function chield()
    {
        return $this->belongsTo('App\Child','id','child_id');
    }
    public function core()
    {
        return $this->belongsToMany('App\Group','group_person')->withPivot('group_id')->withTimestamps();
    }
    public function profession()
    {
        return $this->belongsToMany('App\Profession','profession_person')->withPivot('profession_id')->withTimestamps();
    }
    public function phone()
    {
        return $this->belongsToMany('App\Phone','phone_person')->withPivot('phone_id')->withTimestamps();
    }
    public function address()
    {
        return $this->belongsToMany('App\Address','address_person')->withPivot('address_id');
    }
    public function data_selects($person){
        $selects = array();
        foreach ($person->address as $address) {
            $selects['id']              = $address->id;
            $selects['country_id']      = $address->city->state->country->id;
            $selects['state_id']        = $address->city->state->id;
            $selects['city_id']         = $address->city->id;
            $selects['parish_id']       = $address->parish->id;
            $selects['municipality_id'] = $address->parish->municipality->id;
            $selects['address']         = $address->address;
            $selects['postal_code']     = $address->postal_code;
            $selects['type_address']    = $address->type_address;
            $selects['disabled']        = "";
            break;
        }
        foreach($person->core as $core){
            $selects['core_id']         = $core->id;
            break;
        }
        foreach($person->phone as $phone){
            $selects['type_phone']      = $phone->type;
            $selects['number']          = $phone->number;
            break;
        }
        foreach($person->profession as $profession){
            $selects['representative_id']= $profession->id;
            break;
        }
        //dd($selects['core_id'] );
        return $selects;
    }
    static function age($date){
        date_default_timezone_set('UTC');
        $value  = explode("-", $date, 3);
        $value  = mktime(0,0,0,$value[1],$value[2],$value[0]);
        $age    = (int)((time()-$value)/31556926 );
        $resul['value'] = $age;
        if($age>=15 && $age<=54 ){
            $resul['categorie']  ='Adulto';
        }elseif($age>=55) {
            $resul['categorie']  ='Adulto Mayor';
        }elseif ($age<=14) {
            $resul['categorie']  ='Niño';
        }
        return (object) $resul;
    }
    public function scopeCategorie($query, $categorie='')
    {
        $people = $query->get();
        $categories= [null=>null];
        foreach ($people as $p) {
            $age=$this->age($p->date_birth);
            if($age->categorie==$categorie){

                $text=$p->name_first." ".
                $p->name_last." | ".
                $p->identity_document." | ".
                $age->value." años (".$age->categorie.")";

                $categories[$p->id] = $text;
            }
            unset($age);
        }
        return $categories;
    }
}
