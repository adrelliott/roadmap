<?php

namespace App\Models;

class Step extends BaseModel
{
    protected $fillable = [
        'name', 'description', 'objective'
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    public function roadmap()
    {
        return $this->belongsTo(Stage::class);
    }

    public function stage()
    {
        return $this->hasOne(Stage::class);
    }

    
}
