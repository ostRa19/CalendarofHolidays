<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use App\Console\Commands\DB;
Use DB;

class PrivatData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get_exchange_rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    try{
        $cash_json_string = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
        $cash_json_array = json_decode($cash_json_string, TRUE);
        // echo'<br>cash';  // check required data
        // echo'<br>'.$cash_json_array[0]['ccy'].'<br>'.$cash_json_array[0]['base_ccy'].'<br>'.$cash_json_array[0]['buy'].'<br>'.$cash_json_array[0]['sale'].'<br>';
        // echo'<br>'.$cash_json_array[1]['ccy'].'<br>'.$cash_json_array[1]['base_ccy'].'<br>'.$cash_json_array[1]['buy'].'<br>'.$cash_json_array[1]['sale'].'<br>';

        $cashless_json_string = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11');
        $cashless_json_array = json_decode($cashless_json_string, TRUE);
        // echo'<br>cashless'; //check required data
        // echo'<br>'.$cashless_json_array[0]['ccy'].'<br>'.$cashless_json_array[0]['base_ccy'].'<br>'.$cashless_json_array[0]['buy'].'<br>'.$cashless_json_array[0]['sale'].'<br>';
        // echo'<br>'.$cashless_json_array[1]['ccy'].'<br>'.$cashless_json_array[1]['base_ccy'].'<br>'.$cashless_json_array[1]['buy'].'<br>'.$cashless_json_array[1]['sale'].'<br>';
    }
    catch(Exception $e){
        echo 'Exception is thrown: ',  $e->getMessage(), "\n";
    }

        $curDate = date('Y-m-d h:i:s', time());
       
try{
    DB::table('privatdata')->insert([
        'ccy_cash_USD' => $cash_json_array[0]['ccy'],
        'base_ccy_cash_USD' => $cash_json_array[0]['base_ccy'],
        'buy_cash_USD' => $cash_json_array[0]['buy'],
        'sale_cash_USD' => $cash_json_array[0]['sale'],
        
        'ccy_cash_EUR' => $cash_json_array[1]['ccy'],
        'base_ccy_cash_EUR' => $cash_json_array[1]['base_ccy'],
        'buy_cash_EUR' => $cash_json_array[1]['buy'],
        'sale_cash_EUR' => $cash_json_array[1]['sale'],
        
        'ccy_USD' => $cashless_json_array[0]['ccy'],
        'base_ccy_USD' => $cash_json_array[0]['base_ccy'],
        'buy_USD' => $cashless_json_array[0]['buy'],
        'sale_USD' => $cashless_json_array[0]['sale'],

        'ccy_EUR' => $cashless_json_array[1]['ccy'],
        'base_ccy_EUR' => $cashless_json_array[1]['base_ccy'],
        'buy_EUR' => $cashless_json_array[1]['buy'],
        'sale_EUR' => $cashless_json_array[1]['sale'],

        'created_at' => $curDate,
        'updated_at' => $curDate
    ]);
}
catch(Exception $e){
    echo 'Exception is thrown: ',  $e->getMessage(), "\n";
}

    // $all_rates_now = DB::table('privatdata')->orderBy('id', 'DESC')->first();  
    // $this->line('Exchange Rates now:');
    //dd($all_rates_now);

    }
}    