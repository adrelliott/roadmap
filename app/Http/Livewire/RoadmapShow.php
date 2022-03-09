<?php

namespace App\Http\Livewire;

use App\Models\Roadmap;
use App\Services\RoadmapService;
use Livewire\Component;

class RoadmapShow extends Component
{
    public Roadmap $roadmap;

    public $step;
    public $progress;

    protected string $view = 'livewire.roadmap-show';

    public function mount()
    {
        $this->progress = auth()->user()->steps
            ->pluck('pivot', 'pivot.step_id')
            ->toArray();
    }

    
    /*
    |--------------------------------------------------------------------------
    | View Methods
    |--------------------------------------------------------------------------
    */
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
    }


    /*
    |--------------------------------------------------------------------------
    | Update Methods
    |--------------------------------------------------------------------------
    */
    public function markStepCompleted($step)
    {
        // update progress
    }
    
    public function markStepNotCompleted($step)
    {
        // update progress
    }


}
