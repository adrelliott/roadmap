<?php

namespace Database\Seeders;

use App\Models\Roadmap;
use App\Models\Stage;
use App\Models\Step;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RoadmapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::all();

        foreach ($tenants as $tenant) {
            // make some roadmaps & add stages
            $roadmaps = Roadmap::factory()->count(5)
                ->has(Stage::factory()
                    ->count(3)
                    ->state(new Sequence(
                            [
                                'name' => '03 stage',
                                'position' => 3,
                            ],
                            [
                                'name' => '01 stage',
                                'position' => 1,
                            ],
                            [
                                'name' => '02 stage',
                                'position' => 2,
                            ],
                        )
                    )
                )->create([
                'tenant_id' => $tenant->id
            ]);

            foreach($roadmaps as $roadmap) {
                $stepStartsAt = 1;
                foreach($roadmap->stages as $stage) {
                    $stepsToSave = [
                        new Step([
                            'name' => 'Step ' . $stepStartsAt . ' for roadmap with id of ' . $roadmap->id,
                            'position' => $stepStartsAt,
                            'stage_id' => $stage->id,
                        ]),
                        new Step([
                            'name' => 'Step ' . $stepStartsAt + 1 . ' for roadmap with id of ' . $roadmap->id,
                            'position' => $stepStartsAt + 1,
                            'stage_id' => $stage->id,
                        ]),
                        new Step([
                            'name' => 'Step ' . $stepStartsAt + 2 . ' for roadmap with id of ' . $roadmap->id,
                            'position' => $stepStartsAt + 2,
                            'stage_id' => $stage->id,
                        ]),
                    ];

                    $roadmap->steps()->saveMany($stepsToSave);
                    $stepStartsAt = $stepStartsAt + 3;
                }
            }
        }
    }
}


// $roadmap->steps->saveMany([
//     [new Step([
//             'name' => 'Step 01 for roadmap with id of ' . $roadmap,
//             'position' => 1,
//             'stage_id' => $stages->shift
//     ])],



//     Step::factory()
//         ->count(9)
//         ->state(
//             new Sequence(
//                 [
//                     'name' => 'Step ' . $index . ' for roadmap with id of ' . $roadmap,
//                     'position' => $index,
//                 ],
//             )
//         )->create();
// ])
// }

// ->has(Step::factory()
//                 ->count(9)
//                 ->state(new Sequence(
//                         [
//                             'name' => '01 step',
//                             'position' => 1,
//                         ],
//                         [
//                             'name' => '02 step',
//                             'position' => 2,
//                         ],
//                         [
//                             'name' => '03 step',
//                             'position' => 3,
//                         ],
//                     )
//                 )