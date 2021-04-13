<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected  $table="products_tables";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'category_id',
    ];
}
