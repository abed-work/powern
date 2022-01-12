<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $currencies = [
            [
                'symbol'    => 'LBP',
                'value'     => 32000.00,
                'isActive'  => 0,
                'icon'      => 'L.L'
            ],
            [
                'symbol'    => 'TL',
                'value'     => 13.83,
                'isActive'  => 0,
                'icon'      => '₺'
            ],
            [
                'symbol'    => 'USD',
                'value'     => 1,
                'isActive'  => 0,
                'icon'      => '$'

            ]
        ];

        Currency::insert($currencies);
    }
}
