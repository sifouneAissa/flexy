<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    public $methods = [
        [
            'name' => 'CCP',
            'description' => 'use your ccp account',
            'provider' => 'Bank'
        ],
        [
            'name' => 'Cash on hand',
            'description' => 'Cash on hand',
            'provider' => 'Hand by hand',
        ],
        [
            'name' => 'By Check',
            'description' => 'Cash by check',
            'provider' => 'Bank',
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
        DB::table('payment_methods')->insert($this->methods);
    }
}
