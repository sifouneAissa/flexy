<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('member_ships')->insert([
            [
                'name' => 'Client',
                'description' => 'Description of Client',
                'order' => 3
            ],
            [
                'name' => 'Wholesaler',
                'description' => 'Description of Wholesaler',
                'order' => 2
            ],
            [
                'name' => 'Super wholesaler',
                'description' => 'Description of the super wholesaler',
                'order' => 1
            ]
        ]);
    }
}
