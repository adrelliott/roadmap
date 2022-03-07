<?php

namespace App\Models;

class Stage extends BaseModel
{

    protected $fillable = [
        'name', 'desciption', 'objective'
    ];

    public function steps()
    {
        return $this->hasMany(Step::class);
    }
}
