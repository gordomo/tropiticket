<?php

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $currencies = [
            /* [
                'id' => 1,
                'title' => 'U.S. Dollar',
                'symbol_left' => '$',
                'symbol_right' => '',
                'code' => 'USD',
                'decimal_place' => 2,
                'value' => 1.00000000,
                'decimal_point' => '.',
                'thousand_point' => ',',
                'status' => 1,
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ],
            [
                'id' => 2,
                'title' => 'Euro',
                'symbol_left' => '€',
                'symbol_right' => '',
                'code' => 'EUR',
                'decimal_place' => 2,
                'value' => 0.74970001,
                'decimal_point' => '.',
                'thousand_point' => ',',
                'status' => 1,
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ], */
            [
                'id' => 1,
                'title' => 'Peso',
                'symbol_left' => '$',
                'symbol_right' => '',
                'code' => 'ARS',
                'decimal_place' => 2,
                'value' => 1.00000000,
                'decimal_point' => '.',
                'thousand_point' => ',',
                'status' => 1,
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ],
        ];

        collect($currencies)->map(function($currency) {
            factory(Currency::class)->create($currency);
        });
    }
}
