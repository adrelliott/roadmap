<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::with([
            'roadmaps', 'users', 'roadmaps.stages', 'roadmaps.stages.steps'
        ])->get();

        foreach ($tenants as $tenant) {

            $users = $tenant->users;
        
            $tenant->roadmaps->each(function($roadmap) use ($users) {
                
                $roadmap->tasks()->createMany([
                    ['title' => 'task 1 for roadmap with id of ' . $roadmap->id, 'description' => 'Blah blah', 'assignedto_user_id' => $users->random()->id],
                    ['title' => 'task 2 for roadmap with id of ' . $roadmap->id, 'description' => 'Blah blah', 'assignedto_user_id' => $users->random()->id],
                    ['title' => 'task 3 for roadmap with id of ' . $roadmap->id, 'description' => 'Blah blah', 'assignedto_user_id' => $users->random()->id],
                ]);

                $roadmap->stages->each(function($stage) use ($users) {
                    $stage->tasks()->createMany([
                        ['title' => 'task 1 for stage with id of ' . $stage->id, 'description' => 'Blah blah', 'assignedto_user_id' => $users->random()->id],
                        ['title' => 'task 2 for stage with id of ' . $stage->id, 'description' => 'Blah blah', 'assignedto_user_id' => $users->random()->id],
                        ['title' => 'task 3 for stage with id of ' . $stage->id, 'description' => 'Blah blah', 'assignedto_user_id' => $users->random()->id],
                    ]);

                    $stage->steps->each(function($step) use ($users) {
                        $step->tasks()->createMany([
                            ['title' => 'task 1 for step with id of ' . $step->id, 'description' => 'Blah blah', 'assignedto_user_id' => $users->random()->id],
                            ['title' => 'task 2 for step with id of ' . $step->id, 'description' => 'Blah blah', 'assignedto_user_id' => $users->random()->id],
                            ['title' => 'task 3 for step with id of ' . $step->id, 'description' => 'Blah blah', 'assignedto_user_id' => $users->random()->id],
                        ]);
                    });
                });

            });

        }
    }
}
