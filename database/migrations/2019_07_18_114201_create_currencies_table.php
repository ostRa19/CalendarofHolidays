<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $curDate = date('Y-m-d h:i:s', time());

        Schema::create('currencies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('ccy');
            $table->string('base_ccy');
            $table->float('buy');
            $table->float('sale');

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
        Schema::dropIfExists('currencies');
    }
}
