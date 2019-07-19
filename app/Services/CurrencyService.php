<?php

namespace App\Services;

use App\Currency;

class CurrencyService
{

    public static function getCurrency($cash_array,$cashless_array)
    {
        $insertCommand = new Currency;

        for($i=0;$i<2;$i++){
            $cash = Currency::create($cash_array[$i]);
            $cashless = Currency::create($cashless_array[$i]);
        }
    }
}