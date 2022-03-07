<?php

namespace App\Models;

class Tenant extends BaseModel
{

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function roadmaps()
    {
        return $this->hasMany(Roadmap::class);
    }
}
