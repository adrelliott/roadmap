<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\Progress;
use App\Models\Resource;
use App\Models\Roadmap;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // can comment on:
        $commentables = [
            'roadmaps' => ['roadmaps.notes', 'roadmaps.tasks', 'roadmaps.resources'],
            'roadmaps.stages' => ['roadmaps.stages.notes', 'roadmaps.stages.tasks', 'roadmaps.stages.resources'],
            'roadmaps.stages.steps' => ['roadmaps.stages.steps.notes', 'roadmaps.stages.steps.tasks', 'roadmaps.stages.steps.resources'],
            'users' => ['users.tasks']
            // TODO: 'progress', 'sections'
        ];

        $with = [];
        foreach ($commentables as $key => $value) {
            if(is_array($value)) {
                $with[] = $key;
                foreach($value as $v) {
                $with[] = $v;
                }
            }
            else {
                $with[] = $key;
            }
        }
        $tenants = Tenant::with($with)->get();

        

        // dd($tenants->first()->roadmaps()->first()->stages()->first()->steps->first()->resources->count());

        foreach($tenants as $tenant) {
            $users = $tenant->users;

            foreach ($commentables as $parent => $children) {
                var_dump($parent);
                $collection = $tenant->$parent;
                var_dump($collection->count());

                if($collection) {
                    $collection->each(function($model) use ($children, $users) {
                        foreach($children as $relationship) {
                            $user = $users->random();
                            $related = $model->$relationship;
                            if($related) {
                                $related->comments()->create([
                                    'body' => 'comment by ' . $user->name . ' (id = ' . $user->id . ') on a model with id of ' . $model->id,
                                    'user_id' => $user->id,
                                ]);
                            }
                        }
                    });
                }
            }
        }
    }
}
