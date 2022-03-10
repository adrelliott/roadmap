<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Progress extends Pivot
{
    // use HasFactory;
    protected $casts = [
        'completed_steps' => 'array'
    ];

    protected $table = 'roadmap_user';
    
}
