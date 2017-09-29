<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = "categories_post";

    public function posts(){
        return $this->hasMany('App\Post', 'id_postcategory');
    }
}
