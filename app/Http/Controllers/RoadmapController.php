<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;

class RoadmapController extends Controller
{
    
    /**
     * Find the roadmap and pass to livewire component
     *
     * @param  \App\Models\Roadmap $roadmap
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Roadmap $roadmap)
    {
        if( ! $roadmap->users->contains(auth()->user())) {
            abort(403);
        }
        $roadmap->load([
            'stages', 'stages.steps'
        ]);
        return view('livewire.roadmap-show', compact('roadmap'));
    }
    
    
    
    
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreRoadmapRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreRoadmapRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Roadmap  $roadmap
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Roadmap $roadmap)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Roadmap  $roadmap
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Roadmap $roadmap)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateRoadmapRequest  $request
    //  * @param  \App\Models\Roadmap  $roadmap
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateRoadmapRequest $request, Roadmap $roadmap)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Roadmap  $roadmap
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Roadmap $roadmap)
    // {
    //     //
    // }
}
