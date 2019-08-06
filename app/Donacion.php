<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $fillable = ['benefactor_id', 'donator_id', 'sum'];

    public function benefactors(){
        return $this->belongsToMany('App\User', 'donacion_benefactor', 'benefactor_id');
    }

    public function donators(){
        return $this->belongsToMany('App\User', 'donacion_donator', 'donator_id');
    }
}
