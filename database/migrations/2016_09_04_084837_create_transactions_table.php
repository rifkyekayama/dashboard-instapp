<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            // $table->increments('id');
            $table->Integer('id_transaction');
            $table->unsignedInteger('id_customer');
            $table->string('delivery_type');
            $table->integer('delivery_price');
            $table->integer('amount_to_charge');
            $table->string('payment_solution');
            $table->string('special_request');
            $table->timestamps();

            $table->primary('id_transaction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
