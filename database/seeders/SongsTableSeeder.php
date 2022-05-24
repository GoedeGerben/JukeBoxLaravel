<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2; $i < 12; $i++) { 
            DB::table('songs')->insert([
            'name' => Str::random(10),
            'length' => rand(30,500),
            'user_id' => $i,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
