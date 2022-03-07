<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
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
        
            $tenant->roadmaps->each(function($roadmap) {
                
                $roadmap->resources()->createMany([
                    ['name' => 'textResource 1 for roadmap with id of ' . $roadmap->id, 'body' => 'Blah blah'],
                    ['name' => 'textResource 2 for roadmap with id of ' . $roadmap->id, 'body' => 'Blah blah'],
                    ['name' => 'textResource 3 for roadmap with id of ' . $roadmap->id, 'body' => 'Blah blah'],
                    ['name' => 'urlResource 1 for roadmap with id of ' . $roadmap->id, 'url' => 'https://google.com/ee'],
                    ['name' => 'urlResource 2 for roadmap with id of ' . $roadmap->id, 'url' => 'https://google.com/ff'],
                    ['name' => 'urlResource 3 for roadmap with id of ' . $roadmap->id, 'url' => 'https://google.com/gg'],
                ]);

                $roadmap->stages->each(function($stage) {
                    $stage->resources()->createMany([
                        ['name' => 'textResource 1 for stage with id of ' . $stage->id, 'body' => 'Blah blah'],
                        ['name' => 'textResource 2 for stage with id of ' . $stage->id, 'body' => 'Blah blah'],
                        ['name' => 'textResource 3 for stage with id of ' . $stage->id, 'body' => 'Blah blah'],
                        ['name' => 'urlResource 1 for stage with id of ' . $stage->id, 'url' => 'https://google.com/ee'],
                        ['name' => 'urlResource 2 for stage with id of ' . $stage->id, 'url' => 'https://google.com/ff'],
                        ['name' => 'urlResource 3 for stage with id of ' . $stage->id, 'url' => 'https://google.com/gg'],
                    ]);

                    $stage->steps->each(function($step) {
                        $step->resources()->createMany([
                            ['name' => 'textResource 1 for step with id of ' . $step->id, 'body' => 'Blah blah'],
                            ['name' => 'textResource 2 for step with id of ' . $step->id, 'body' => 'Blah blah'],
                            ['name' => 'textResource 3 for step with id of ' . $step->id, 'body' => 'Blah blah'],
                            ['name' => 'urlResource 1 for step with id of ' . $step->id, 'url' => 'https://google.com/ee'],
                            ['name' => 'urlResource 2 for step with id of ' . $step->id, 'url' => 'https://google.com/ff'],
                            ['name' => 'urlResource 3 for step with id of ' . $step->id, 'url' => 'https://google.com/gg'],
                        ]);
                    });
                });

            });

        }
    }
}
