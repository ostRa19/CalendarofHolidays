<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Services\CurrencyService;

class CurrencyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:currency1';

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
            $cash_string = file_get_contents(env('CASH_URL'));
            $cash_array = json_decode($cash_string, TRUE);
            
            $cashless_string = file_get_contents(env('CASHLESS_URL'));
            $cashless_array = json_decode($cashless_string, TRUE);
    
            CurrencyService::getCurrency($cash_array,$cashless_array);
        }

        catch(Exception $e){
            echo 'Exception is thrown: ',  $e->getMessage(), "\n";
        }
             
    }
}
