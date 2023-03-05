<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderTypeSeeder extends Seeder
{

    public $types = [
            [
                'name' => 'Mobile & Internet',
                'description' => 'Description of the Mobile & Internet',
                'icon' => 'bi-phone',
                'order' => 1,
                'active' => true,
            ],
            [
                'name' => 'Games',
                'description' => 'Description of the Games',
                'icon' => 'bi-controller',
                'order' => 2,
                'active' => true
            ]

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('provider_types')->insert($this->types);
    }
}
