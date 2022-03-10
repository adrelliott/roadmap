<?php

namespace App\Http\Livewire\App;

use App\Exceptions\UserNotInvitedToRoadmapException;
use App\Models\Roadmap;
use Livewire\Component;

class RoadmapShow extends Component
{

    public Roadmap $roadmap;
    public array $progress;

    public function mount()
    {
        $this->user = auth()->user()->load([
            'roadmaps', 'roadmaps.stages', 'roadmaps.steps'
        ]);
        $this->progress = $this->user->roadmaps->pluck('pivot', 'id')->toArray();
        
        // Check the user has been invited to this roadmap  
        if( ! array_key_exists($this->roadmap->id, $this->progress)) {
            throw new UserNotInvitedToRoadmapException("You've not been given access to this roadmap");
        }

        $this->roadmap->progress  = $this->progress[$this->roadmap->id];
    }


    public function render()
    {
        return view('livewire.app.roadmap-show');
    }
}