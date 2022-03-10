<?php

namespace App\Models;

use Illuminate\Support\Str;

class Roadmap extends BaseModel
{    

    protected $fillable = [
        'name', 'description' // maybe remove the slug? Add as a mutator
    ];

    // protected $with = [
    //     'notes', 'tasks', 'resources',
    //     'stages', 'stages.steps', 
    // ];

    // protected static function booted()
    // {
    //     static::creating(function ($roadmap) {
    //         $roadmap->slug = Str::slug(Str::limit($roadmap->name, 15), '-');
    //     });
    // }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function progress()
    {
        return $this->users()
            ->using(Progress::class)
            ->withPivot('completed_steps')
            ->withTimestamps();
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
