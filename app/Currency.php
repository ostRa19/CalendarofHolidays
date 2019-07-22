<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $table = 'currencies';
    protected $fillable = ['ccy', 'base_ccy', 'buy', 'sale'];
}
