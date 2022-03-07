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
            Roadmap::factory()->count(5)
            ->has(Stage::factory()
                ->count(3)
                ->state(new Sequence(
                        [
                            'name' => '01 stage',
                            'position' => 1,
                        ],
                        [
                            'name' => '02 stage',
                            'position' => 2,
                        ],
                        [
                            'name' => '03 stage',
                            'position' => 3,
                        ],
                    )
                )
                ->has(Step::factory()
                    ->count(3)
                    ->state(new Sequence(
                            [
                                'name' => '01 step',
                                'position' => 1,
                            ],
                            [
                                'name' => '02 step',
                                'position' => 2,
                            ],
                            [
                                'name' => '03 step',
                                'position' => 3,
                            ],
                        )
                    )
                )
            )->create([
                'tenant_id' => $tenant->id
            ]);
        }
    }
}
