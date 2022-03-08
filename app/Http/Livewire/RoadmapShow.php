<?php

namespace App\Http\Livewire;

use App\Models\Roadmap;
use Livewire\Component;

class RoadmapShow extends Component
{
    public Roadmap $roadmap;

    protected string $view = 'livewire.roadmap-show';

    public $step;

    
    public function render()
    {
        return view($this->view);
    }

    public function showStep($stepId)
    {
        $this->step = $this->roadmap->steps->where('id', $stepId)->first();
        $this->view = 'livewire.step-show';
    }

    public function backToRoadmap()
    {
        $this->reset(['step', 'view']);
        // $this->view = 'livewire.roadmap-show';

    }
}
