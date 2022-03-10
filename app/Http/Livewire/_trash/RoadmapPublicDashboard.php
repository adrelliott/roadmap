<?php

// namespace App\Http\Livewire;

// use App\Models\Roadmap;
// use App\Models\User;
// use App\Services\RoadmapService;
// use Illuminate\Support\Collection;
// use Livewire\Component;

// class RoadmapPublicDashboard extends Component
// {
//     public Roadmap $roadmap;
//     public User $user;
//     public Collection $roadmaps;
//     public $step;
//     public $progress;
//     protected string $view = 'livewire.roadmap-list';

//     public function mount()
//     {
//         $this->user = auth()->user();
//         $this->roadmaps = $this->user->roadmaps->load([
//             'stages', 'stages.steps', 'stages.steps', 'stages.steps.users'
//         ]);
        
//         dd($this->roadmaps);

//         // $this->progress = $this->user->steps
//         //     ->pluck('pivot', 'pivot.step_id')
//         //     ->toArray();

//         $status = $this->user->steps;
//         dd($status);
        
//         dd($this->progress);

//         $progress = [
//             'roadmap_id' => [
//                 'progress' => [
//                     'total_steps' => 30,
//                     'total_steps_completed' => 21,
//                     'current_step' => 33
//                 ],
//                 'step_id' => [
//                     "user_id" => 46,
//                     "step_id" => 1,
//                     "started_at" => "2022-03-09 08:30:25",
//                     "completed_at" => "2022-03-09 08:30:25",
//                 ]
//             ]
//         ];
//     }

    
//     /*
//     |--------------------------------------------------------------------------
//     | View Methods
//     |--------------------------------------------------------------------------
//     */
//     public function render()
//     {
//         return view($this->view);
//     }

//     public function showStep($stepId)
//     {
//         $this->step = $this->roadmap->steps->where('id', $stepId)->first();
//         $this->view = 'livewire.step-show';
//     }

//     public function backToRoadmap()
//     {
//         $this->reset(['step', 'view']);
//     }


//     /*
//     |--------------------------------------------------------------------------
//     | Update Methods
//     |--------------------------------------------------------------------------
//     */
//     public function markStepCompleted($step)
//     {
//         // update progress
//     }
    
//     public function markStepNotCompleted($step)
//     {
//         // update progress
//     }


// }
