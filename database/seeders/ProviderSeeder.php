<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('providers')->insert([
            [
                'name' => 'Mobilis',
                'code' => '06',
                'percentage' => '4',
                'percentage_fix' => false,
                'is_service_provider' => false,
                'unit' => 'dz',
                'price_per_unit' => 1
            ],
            [
                'name' => 'Ooredoo',
                'code' => '05',
                'percentage' => '4',
                'percentage_fix' => false,
                'is_service_provider' => false,
                'unit' => 'dz',
                'price_per_unit' => 1
            ],
            [
                'name' => 'Djezzy',
                'code' => '07',
                'percentage' => '4',
                'percentage_fix' => false,
                'is_service_provider' => false,
                'unit' => 'dz',
                'price_per_unit' => 1
            ]
        ]);
    }
}
