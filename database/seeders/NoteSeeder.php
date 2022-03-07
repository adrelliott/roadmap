<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::with([
            'roadmaps', 'users', 'users.tasks', 'roadmaps.stages', 'roadmaps.stages.steps'
        ])->get();

        foreach ($tenants as $tenant) {
            $users = $tenant->users;
        
            $tenant->roadmaps->each(function($roadmap) use($users) {

                $roadmap->notes()->createMany([
                    ['title' => 'note 1 for roadmap with id of ' . $roadmap->id, 'body' => 'Blah blah', 'user_id' => $users->random()->id],
                    ['title' => 'note 2 for roadmap with id of ' . $roadmap->id, 'body' => 'Blah blah', 'user_id' => $users->random()->id],
                    ['title' => 'note 3 for roadmap with id of ' . $roadmap->id, 'body' => 'Blah blah', 'user_id' => $users->random()->id],
                ]);

                $roadmap->stages->each(function($stage) use($users) {
                    $stage->notes()->createMany([
                        ['title' => 'note 1 for stage with id of ' . $stage->id, 'body' => 'Blah blah', 'user_id' => $users->random()->id],
                        ['title' => 'note 2 for stage with id of ' . $stage->id, 'body' => 'Blah blah', 'user_id' => $users->random()->id],
                        ['title' => 'note 3 for stage with id of ' . $stage->id, 'body' => 'Blah blah', 'user_id' => $users->random()->id],
                    ]);

                    $stage->steps->each(function($step) use($users) {
                        $step->notes()->createMany([
                            ['title' => 'note 1 for step with id of ' . $step->id, 'body' => 'Blah blah', 'user_id' => $users->random()->id],
                            ['title' => 'note 2 for step with id of ' . $step->id, 'body' => 'Blah blah', 'user_id' => $users->random()->id],
                            ['title' => 'note 3 for step with id of ' . $step->id, 'body' => 'Blah blah', 'user_id' => $users->random()->id],
                        ]);
                    });
                });

            });

            $tenant->users->each(function($user) {
                $user->tasks->each(function ($task) use($user) {
                    $task->notes()->create([
                        'title' => 'Note for task with id of ' . $task->id, 'body' => 'Body of the note', 'user_id' => $user->id
                    ]);
                });
            });

        }
    }
}
