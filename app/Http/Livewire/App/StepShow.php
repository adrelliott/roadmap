<?php

namespace App\Http\Livewire\App;

use App\Models\Step;
use Livewire\Component;

class StepShow extends Component
{
    public Step $step;
    
    public function render()
    {
        return view('livewire.app.step-show');
    }
}