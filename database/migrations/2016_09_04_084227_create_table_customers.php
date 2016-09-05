<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('customers', function (Blueprint $table) {
            // $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->string('login');
            $table->string('name');
            $table->string('address');
            $table->string('zip');
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            $table->string('email');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('contact_email');
            $table->string('link_to_customer');
            $table->timestamps();

            $table->primary('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('customers');
    }
}
