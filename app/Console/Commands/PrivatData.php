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
    protected $signature = 'command:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get exchange rates';

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
            $cash_json_string = file_get_contents(env('CASH_URL'));
            $cash_json_array = json_decode($cash_json_string, TRUE);
            
            $cashless_json_string = file_get_contents(env('CASHLESS_URL'));
            $cashless_json_array = json_decode($cashless_json_string, TRUE);
            
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
    }
}    