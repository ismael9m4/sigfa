<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'state',
        'condition_sensor',
        'type',
        'description',
        'fk_device',
        ];
    use HasFactory;
    //Relacion Uno a Muchos
    public function readings(){
        return $this->hasMany('App\Models\Reading');
    }
    //Relacion Uno a Muchos (Inversa)
    public function devices(){
        return $this->belongsTo('App\Models\Device');
    }
}
