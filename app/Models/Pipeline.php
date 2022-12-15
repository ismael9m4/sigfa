<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
    protected $fillable = [
        'positiong',
        'country',
        'province',
        'location',
        'neighborhood',
        'district',
        'material',
        'diameter',
        'thickness',
        'length',
        'depth_earth',
        'type_cover',
        'life_time',
        ];
    use HasFactory;

    public function leakages(){
        return $this->hasMany('App\Models\Leakage');
    }
}
