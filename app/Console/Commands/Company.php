<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Company extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'privatapi:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds';

 
    public function handle()
    {
        $company = Company::create([
            'name' => $this->argument('name'),
            'test' => '123-123-1234'
        ]);


            $this->info('Added:' . $company->name);//$company->name

    }
}
