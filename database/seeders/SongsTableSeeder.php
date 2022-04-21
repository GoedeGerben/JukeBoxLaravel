<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(app/song::class, 50)->create();
    }
}
