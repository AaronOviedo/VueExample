<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rol extends Model
{
    protected $fillable = [
        'rol', 'description'
    ];

    public function user(){
        return BelongsTo('User');
    }
}
