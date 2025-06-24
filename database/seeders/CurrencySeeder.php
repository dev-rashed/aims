<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                'name' => 'Pound Sterling',
                'symbol' => '£',
                'exchange_rate' => 1,
                'code' => 'GBP',
            ],
            [
                'name' => 'U.S. Dollar',
                'symbol' => '$',
                'exchange_rate' => 1.30,
                'code' => 'USD',
            ],
            [
                'name' => 'Australian Dollar',
                'symbol' => '$',
                'exchange_rate' => 1,
                'code' => 'AUD',
            ],
            [
                'name' => 'Brazilian Real',
                'symbol' => 'R$',
                'exchange_rate' => 1,
                'code' => 'BRL',
            ],
            [
                'name' => 'Canadian Dollar',
                'symbol' => '$',
                'exchange_rate' => 1,
                'code' => 'CAD',
            ],
            [
                'name' => 'Czech Koruna',
                'symbol' => 'Kč',
                'exchange_rate' => 1,
                'code' => 'CZK',
            ],
            [
                'name' => 'Danish Krone',
                'symbol' => 'kr',
                'exchange_rate' => 1,
                'code' => 'DKK',
            ],
            [
                'name' => 'Euro',
                'symbol' => '€',
                'exchange_rate' => 1,
                'code' => 'EUR',
            ],
            [
                'name' => 'Hong Kong Dollar',
                'symbol' => '$',
                'exchange_rate' => 1,
                'code' => 'HKD',
            ],
            [
                'name' => 'Hungarian Forint',
                'symbol' => 'Ft',
                'exchange_rate' => 1,
                'code' => 'HUF',
            ],
            [
                'name' => 'Japanese Yen',
                'symbol' => '¥',
                'exchange_rate' => 1,
                'code' => 'JPY',
            ],
            [
                'name' => 'Malaysian Ringgit',
                'symbol' => 'RM',
                'exchange_rate' => 1,
                'code' => 'MYR',
            ],
            [
                'name' => 'Mexican Peso',
                'symbol' => '$',
                'exchange_rate' => 1,
                'code' => 'MXN',
            ],
            [
                'name' => 'Norwegian Krone',
                'symbol' => 'kr',
                'exchange_rate' => 1,
                'code' => 'NOK',
            ],
            [
                'name' => 'New Zealand Dollar',
                'symbol' => '$',
                'exchange_rate' => 1,
                'code' => 'NZD',
            ],
            [
                'name' => 'Philippine Peso',
                'symbol' => '₱',
                'exchange_rate' => 1,
                'code' => 'PHP',
            ],
            [
                'name' => 'Polish Zloty',
                'symbol' => 'zł',
                'exchange_rate' => 1,
                'code' => 'PLN',
            ],
            [
                'name' => 'Russian Ruble',
                'symbol' => 'руб',
                'exchange_rate' => 1,
                'code' => 'RUB',
            ],
            [
                'name' => 'Singapore Dollar',
                'symbol' => '$',
                'exchange_rate' => 1,
                'code' => 'SGD',
            ],
            [
                'name' => 'Swedish Krona',
                'symbol' => 'kr',
                'exchange_rate' => 1,
                'code' => 'SEK',
            ],
            [
                'name' => 'Swiss Franc',
                'symbol' => 'CHF',
                'exchange_rate' => 1,
                'code' => 'CHF',
            ],
            [
                'name' => 'Thai Baht',
                'symbol' => '฿',
                'exchange_rate' => 1,
                'code' => 'THB',
            ],
            [
                'name' => 'Taka',
                'symbol' => '৳',
                'exchange_rate' => 1,
                'code' => 'BDT',
            ],
            [
                'name' => 'Indian Rupee',
                'symbol' => 'Rs',
                'exchange_rate' => 1,
                'code' => 'INR',
            ],
        ];

        foreach ($currencies as $currency) {
            $currency['exchange_rate'] = currencyConvert(1, 'GBP', $currency['code']);
            Currency::query()->updateOrCreate($currency);
        }
    }
}
