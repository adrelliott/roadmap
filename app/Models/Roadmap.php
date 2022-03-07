<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;
    

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
