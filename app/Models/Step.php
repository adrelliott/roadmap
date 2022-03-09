<?php

namespace App\Models;

class Step extends BaseModel
{
    protected $fillable = [
        'name', 'description', 'objective'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
