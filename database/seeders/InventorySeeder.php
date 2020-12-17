<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')->insert([
            [
                'date' => '2020-06-05',
                'type' => 'Purchase',
                'quantity' => 10,
                'unit_price' => 5.0,
            ],
            [
                'date' => '2020-06-07',
                'type' => 'Purchase',
                'quantity' => 30,
                'unit_price' => 4.5,
            ],
            [
                'date' => '2020-06-08',
                'type' => 'Application',
                'quantity' => -20,
                'unit_price' => null,
            ],
            [
                'date' => '2020-06-09',
                'type' => 'Purchase',
                'quantity' => 10,
                'unit_price' => 5.0,
            ],
            [
                'date' => '2020-06-10',
                'type' => 'Purchase',
                'quantity' => 34,
                'unit_price' => 4.5,
            ],
            [
                'date' => '2020-06-15',
                'type' => 'Application',
                'quantity' => -25,
                'unit_price' => null,
            ],
            [
                'date' => '2020-06-23',
                'type' => 'Application',
                'quantity' => -37,
                'unit_price' => null,
            ],
            [
                'date' => '2020-07-10',
                'type' => 'Purchase',
                'quantity' => 47,
                'unit_price' => 4.3,
            ],
            [
                'date' => '2020-07-12',
                'type' => 'Application',
                'quantity' => -38,
                'unit_price' => null,
            ],
            [
                'date' => '2020-07-13',
                'type' => 'Purchase',
                'quantity' => 10,
                'unit_price' => 5.0,
            ],
            [
                'date' => '2020-07-25',
                'type' => 'Purchase',
                'quantity' => 50,
                'unit_price' => 4.2,
            ],
            [
                'date' => '2020-07-26',
                'type' => 'Application',
                'quantity' => -28,
                'unit_price' => null,
            ],
            [
                'date' => '2020-07-31',
                'type' => 'Purchase',
                'quantity' => 10,
                'unit_price' => 5.0,
            ],
            [
                'date' => '2020-08-14',
                'type' => 'Purchase',
                'quantity' => 15,
                'unit_price' => 5.0,
            ],
            [
                'date' => '2020-08-17',
                'type' => 'Purchase',
                'quantity' => 3,
                'unit_price' => 6.0,
            ],
            [
                'date' => '2020-08-29',
                'type' => 'Purchase',
                'quantity' => 2,
                'unit_price' => 7.0,
            ],
            [
                'date' => '2020-08-31',
                'type' => 'Application',
                'quantity' => -30,
                'unit_price' => null,
            ],
        ]);
    }
}
