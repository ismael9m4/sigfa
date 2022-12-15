<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leakage extends Model
{
    protected $fillable = [
        'stimad_less',
        'datetime',
        'cause',
        'details',
        'fk_category',
        'fk_pipeline',
        ];
    use HasFactory;
    public function categories(){
        return $this->belongsTo('App\Models\Category');
    }
    public function pipelines(){
        return $this->belongsTo('App\Models\Pipeline');
    }
}
