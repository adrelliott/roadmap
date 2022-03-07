<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::factory()->count(4)
            ->has(User::factory()->count(1)->isAdmin()) // The owner of this roadmap
            ->has(User::factory()->count(10)) // The customers of this roadmap
            ->create();
        
        // Create easily remembered users
        $tenants->first()->users()->saveMany([
            User::factory()->isAdmin()->create([
                'name' => 'AdminAl', 'email' => 'admin@al.com'
            ]),
            User::factory()->create([
                'name' => 'ClientAl', 'email' => 'client@al.com'
            ])
        ]);
    }
}
