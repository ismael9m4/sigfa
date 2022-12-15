<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Level;

class Incident extends Model
{
    protected $fillable = [
        'title',
        'description',
        'severity',
        'fk_level',
        'fk_client',
        'fk_support',
        ];
    use HasFactory;

    //Relacion Inversa Uno a Muchos
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }


}
