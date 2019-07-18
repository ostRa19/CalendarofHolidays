<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivatdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privatdata', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('ccy_cash_USD'); //cash USD
            $table->string('base_ccy_cash_USD');
            $table->double('buy_cash_USD');
            $table->double('sale_cash_USD');

            $table->string('ccy_cash_EUR'); //cash EUR
            $table->string('base_ccy_cash_EUR');
            $table->double('buy_cash_EUR');
            $table->double('sale_cash_EUR');  

            $table->string('ccy_USD'); //cashless USD
            $table->string('base_ccy_USD');
            $table->double('buy_USD'); 
            $table->double('sale_USD');

            $table->string('ccy_EUR'); //cashless EUR
            $table->string('base_ccy_EUR');
            $table->double('buy_EUR'); 
            $table->double('sale_EUR');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::dropIfExists('privatdata');
    }
}
