<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'voting';

    protected $fillable = [
        'kasutajaID', 'postitusID', 'status',
    ];
}
