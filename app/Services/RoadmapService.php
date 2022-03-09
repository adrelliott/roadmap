<?php
namespace App\Services;

use App\Models\Roadmap;

class RoadmapService
{

    public $roadmap;
    public $completedSteps;
    public $startedSteps;

    public function __construct(Roadmap $roadmap)
    {
        $this->roadmap = $roadmap;
        $this->completedSteps = auth()->user()->completedSteps();
        $this->startedSteps = auth()->user()->startedSteps();
    }

    
}