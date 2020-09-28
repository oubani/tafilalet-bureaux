<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'ref', 'name', 'image', 'category_id'
    ];
}
