<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;
    //Relacion Uno a Muchos (Inversa)
    // public function device(){
    //     return $this->belongsTo('App\Models\Device');
    // }
    //Relacion Uno a Muchos (Inversa)
    public function sensor(){
        return $this->belongsTo('App\Models\Sensor');
    }
}
