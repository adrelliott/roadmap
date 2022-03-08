<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = auth()->user()
            ->load([
                'roadmaps', 'roadmaps.stages', 'roadmaps.steps'
            ]);
        
        return view('dashboard', compact('data'));
    }
}
