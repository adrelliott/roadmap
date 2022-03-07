<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model 
{
    use HasFactory;

    public function resources()
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    public function tasks()
    {
        return $this->morphMany(Task::class, 'taskable');
    }

    public function sections()
    {
        return $this->morphMany(Section::class, 'sectionable');
    }
}