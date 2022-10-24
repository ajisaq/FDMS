<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $roles = [
            [
                'name' => 'ADMIN'
            ],
            [
                'name' => 'HQ'
            ],
            [
                'name' => 'SUPERVISOR'
            ],
            [
                'name' => 'MANAGER'
            ],
            [
                'name' => 'AGENT'
            ],
        ];

        foreach ($roles as $r) {
             \App\Models\Role::create([
                 'name'=>$r['name'],
             ]);
        }
    }
}
