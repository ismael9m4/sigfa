<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Device extends Model
{
    protected $fillable = [
        'id',
        'serie',
        'details',
        'fk_pipeline',
        ];
    use HasFactory;
    //Relacion Muchos a Muchos
    // public function sensores(){
    //     return $this->belongsToMany('App\Models\Sensor');
    // }
    //Relacion Uno a Muchos
    // public function readings(){
    //     return $this->hasMany('App\Models\Readings');
    // }
    //Relacion Uno a Muchos
    public function sensors(){
        return $this->hasMany('App\Models\Sensor');
    }
}
