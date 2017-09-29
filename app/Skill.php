<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function user(){
        return $this->belongsToMany('App\User', 'users_has_skills', 'id_skill', 'id_user');
    }
}
