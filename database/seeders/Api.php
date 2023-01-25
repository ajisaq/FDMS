<?php

namespace Database\Seeders;

use App\Models\Api as ModelsApi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Api extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $token = Str::random(60);

        ModelsApi::create([
                    'name' => "Mobile",
                    'api_user' => "Mobile",
                    'api_key' => $token,
                ]);
    }
}
