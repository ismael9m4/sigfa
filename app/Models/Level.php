<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incident;

class Level extends Model
{
    protected $fillable = [
        'name',
        'description',
        ];
    use HasFactory;

    public function incidents(){
        return $this->HasMany('App\Models\Incident');
    }
}
