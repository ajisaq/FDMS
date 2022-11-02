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

        $locations = [
            [
                'name' => 'Abia'
            ],
            [
                'name' => 'Abuja'
            ],
            [
                'name' => 'Adamawa'
            ],
            [
                'name' => 'Akwa Ibom'
            ],
            [
                'name' => 'Anambra'
            ],
            [
                'name' => 'Bauchi'
            ],
            [
                'name' => 'Bayelsa '
            ],
            [
                'name' => 'Benue '
            ],
            [
                'name' => 'Borno'
            ],
            [
                'name' => 'Cross River'
            ],
            [
                'name' => 'Delta'
            ],
            [
                'name' => 'Ebonyi'
            ],
            [
                'name' => 'Edo'
            ],
            [
                'name' => 'Ekiti'
            ],
            [
                'name' => 'Enugu'
            ],
            [
                'name' => 'Gombe'
            ],
            [
                'name' => 'Imo'
            ],
            [
                'name' => 'Jigawa'
            ],
            [
                'name' => 'Kaduna'
            ],
            [
                'name' => 'Kano'
            ],
            [
                'name' => 'Katsina'
            ],
            [
                'name' => 'Kebbi'
            ],
            [
                'name' => 'Kogi'
            ],
            [
                'name' => 'Kwara'
            ],
            [
                'name' => 'Lagos'
            ],
            [
                'name' => 'Nasarawa'
            ],
            [
                'name' => 'Niger'
            ],
            [
                'name' => 'Ogun'
            ],
            [
                'name' => 'Ondo'
            ],
            [
                'name' => 'Osun'
            ],
            [
                'name' => 'Oyo'
            ],
            [
                'name' => 'Plateau'
            ],
            [
                'name' => 'Rivers'
            ],
            [
                'name' => 'Sokoto'
            ],
            [
                'name' => 'Taraba '
            ],
            [
                'name' => 'Yobe'
            ],
            [
                'name' => 'Zamfara'
            ],
        ];

        foreach ($locations as $l) {
             \App\Models\Location::create([
                 'name'=>$l['name'],
             ]);
        }

    }
}
