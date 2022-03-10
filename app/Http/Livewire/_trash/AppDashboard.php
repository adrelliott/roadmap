<?php

namespace App\Http\Livewire;

use App\Models\Roadmap;
use App\Models\Step;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class AppDashboard extends Component
{
    protected $viewName = 'roadmaps.index';
    
    public User $user;
    public Collection $roadmaps;
    public Roadmap $roadmap;
    public Step $step;
    public $progress;

    public function mount()
    {
        $this->user = auth()->user()->load([
            'roadmaps', 'roadmaps.stages', 'roadmaps.steps'
        ]);
        $this->progress = $this->user->roadmaps->pluck('pivot.completed_steps', 'id')->toArray();
    }

    public function render()
    {
        return view('livewire.app.' . $this->viewName);
    }

    public function viewRoadmap($roadmapId)
    {
        $this->viewName = 'roadmaps.show';
        $this->roadmap = $this->user->roadmaps->find($roadmapId);
    }

    // public function viewStep($stepId)
    // {
    //     $this->viewName = 'steps.show';
    //     $this->step = $this->roadmap->steps->find($stepId);
    // }

    public function completeStep($roadmapId, $stepId, $completed = true)
    {
        $changes = $this->progress[$roadmapId];
        $changes[$stepId]['completed_at'] = $completed ? now()->format('Y-m-d H:i:s') : NULL;
        $this->user->roadmaps()->updateExistingPivot($roadmapId, ['completed_steps' => $changes]);
        $this->viewName = 'roadmaps.show';
        $this->user->refresh();
    }

    public function startStep($roadmapId, $stepId, $started = true)
    {
        $changes = $this->progress[$roadmapId];
        $changes[$stepId]['started_at'] = $started ? now()->format('Y-m-d H:i:s') : NULL;
        $this->user->roadmaps()->updateExistingPivot($roadmapId, ['completed_steps' => $changes]);
        $this->viewName = 'roadmaps.show';
        $this->user->refresh();
    }
}
