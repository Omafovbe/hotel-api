<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_managers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cust_firstname');
            $table->string('cust_lastname');
            $table->string('cust_address')->nullable();
            $table->string('cust_city')->nullable();
            $table->string('cust_country')->nullable();
            $table->string('cust_phone');
            $table->string('cust_fax')->nullable();
            $table->string('cust_email')->unique();
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
        Schema::dropIfExists('customer_managers');
    }
}
