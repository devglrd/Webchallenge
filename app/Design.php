<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $fillable = ['title', 'content', 'level_design'];

    public function tags(){
        return $this->belongsToMany('App\Tag', 'designs_has_tags', 'id_design','id_tag');
    }

}
