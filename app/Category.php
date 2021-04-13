<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'parent_category_id',
    ];
  

    public function childs() {
        return $this->hasMany('App\Category','parent_category_id','id') ;
    }
}
