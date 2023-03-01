<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('levels')->insert([
            [
                'name' => 'Level 1',
                'description' => 'Description of the level 1',
                'order' => 1
            ],
            [
                'name' => 'Level 2',
                'description' => 'Description of the level 2',
                'order' => 2
            ],
            [
                'name' => 'Level 3',
                'description' => 'Description of the level 3',
                'order' => 3
            ],
            [
                'name' => 'Level 4',
                'description' => 'Description of the level 4',
                'order' => 4
            ]
        ]);
    }
}
