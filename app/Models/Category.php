<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'name',
        'details',
        ];
    use HasFactory;
    public function leakages(){
        return $this->hasMany('App\Models\Leakage');
    }
}
