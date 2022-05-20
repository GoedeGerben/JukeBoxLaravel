<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genreTypes = ['rock', 'metal', 'klassiek', 'dubstep', 'rap'];
        for ($i=0; $i <= (count($genreTypes) - 1); $i++) { 
            DB::table('genres')->insert([
                'name' => $genreTypes[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
