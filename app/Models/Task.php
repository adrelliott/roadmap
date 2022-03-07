<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'due_at'
    ];

    public $timestamps = false;

    public function taskable()
    {
        return $this->morphTo();
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable');
    }
}
