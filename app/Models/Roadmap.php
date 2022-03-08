<?php

namespace App\Models;

use Illuminate\Support\Str;

class Roadmap extends BaseModel
{    

    protected $fillable = [
        'name', 'description', 'slug' // maybe remove the slug? Add as a mutator
    ];

    // protected $with = [
    //     'notes', 'tasks', 'resources',
    //     'stages', 'stages.steps', 
    // ];

    protected static function booted()
    {
        static::creating(function ($roadmap) {
            $roadmap->slug = Str::slug(Str::limit($roadmap->name, 15), '-');
        });
    }

    // public function setSlugAttribute()
    // {
    //     return Str::slug(Str::limit($this->name, 15), '-');
    // }

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function steps()
    {
        return $this->hasManyThrough(Step::class, Stage::class);
    }

    public function taskCount()
    {
        return $this->tasks()->count();
    }

    // public function stepsCount()
    // {
    //     return $this->steps->count();
    // }
}
