<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'id','json','user_id','edited_by','edit_at','deleted_by'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
