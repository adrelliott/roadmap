<?php

namespace App\Http\Livewire\App\Roadmaps;

use Livewire\Component;

class Show extends Component
{
    public $inShow = 'yes';
    
    public function render()
    {
        return view('livewire.app.roadmaps.show');
    }
}
