<?php

namespace App\Http\Livewire\App;

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class Dashboard extends Component
{
    public User $user;
    public Collection $roadmaps;
    public array $progress;

    public function mount()
    {
        $this->user = auth()->user()->load([
            'roadmaps', 'roadmaps.stages', 'roadmaps.steps'
        ]);
        $this->roadmaps = $this->user->roadmaps;
        $this->progress = $this->user->roadmaps->pluck('pivot', 'id')->toArray();
    }

    public function render()
    {
        return view('livewire.app.dashboard');
    }

}