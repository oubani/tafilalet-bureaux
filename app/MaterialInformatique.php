<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialInformatique extends Model
{
    protected $fillable = [
        'ref', 'name', 'description', 'etat', 'garentie'
    ];
}
