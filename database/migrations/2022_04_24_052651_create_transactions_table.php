<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('org_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->string('ref');
            $table->float('amount');
            $table->float('quantity');
            $table->timestamps();
            
            $table->foreign('org_id')->references('id')->on('organizations');
            // $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('user_id')->references('id')->on('users');
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
