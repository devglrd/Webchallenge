<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignCategory extends Model
{
    protected $table = "categories_design";

    public function category(){
        return $this->belongsTo('App\Category', 'id_designcategory');
    }
}
