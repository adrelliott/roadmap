<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersInvitedToRoadmapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::with([
                'users', 'roadmaps'
            ])->get();

        foreach ($tenants as $tenant) {
            $tenant->roadmaps->each(function ($roadmap) use($tenant) {
                $roadmap->users()->sync(
                    $tenant->users->pluck('id')
                    // $tenant->users->random(5)->pluck('id')
                );
            });
        }
    }
}
