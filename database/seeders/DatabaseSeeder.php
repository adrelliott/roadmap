<?php

namespace Database\Seeders;

use App\Models\Roadmap;
use App\Models\Stage;
use App\Models\Step;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TenantAndUserSeeder::class,
            RoadmapSeeder::class,
            UsersInvitedToRoadmapSeeder::class,
        ]);
        
    }
}
