<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class credenciado extends Model
{
   
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
