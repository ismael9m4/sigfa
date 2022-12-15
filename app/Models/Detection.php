<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detection extends Model
{
    protected $fillable = [
        'neighborhood',
        'datetime',
        'cause',
        'positiong',
        'variacionpresion',
        'variacionvalvula',
        'id_device',
        'id_sensor',
        ];
    use HasFactory;
}
