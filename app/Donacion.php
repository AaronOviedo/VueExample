<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $fillable = ['benefactor_id', 'donator_id', 'sum'];

    public function benefactor(){
        return $this->belongsTo('App\User', 'id', 'benefactor_id');
    }

    public function donator(){
        return $this->belongsTo('App\User', 'id', 'donator_id');
    }
}
