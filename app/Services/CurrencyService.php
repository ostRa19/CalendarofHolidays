<?php

namespace App\Services;

use App\Currency;

class CurrencyService
{

    public static function getCurrency($cash_array,$cashless_array)
    {
        $insertCommand = new Currency;

        for($i=0;$i<2;$i++){
            $cash = Currency::create([
                'ccy' => $cash_array[$i]['ccy'],
                'base_ccy' => $cash_array[$i]['base_ccy'],
                'buy' => $cash_array[$i]['buy'],
                'sale' => $cash_array[$i]['sale']         
            ]);
            $cashless = Currency::create([
                'ccy' => $cash_array[$i]['ccy'],
                'base_ccy' => $cash_array[$i]['base_ccy'],
                'buy' => $cash_array[$i]['buy'],
                'sale' => $cash_array[$i]['sale']         
            ]);
        }
    }
}