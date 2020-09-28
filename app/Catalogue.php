<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    //
    protected $fillable = [
        'mois', 'cover', 'pdfFile'
    ];
}
