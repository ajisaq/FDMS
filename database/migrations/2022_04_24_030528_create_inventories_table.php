<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('org_id');
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('cluster_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->float('amount');
            $table->integer('with_quantity');
            $table->integer('with_payer_name');
            $table->string('unit');
            $table->timestamps();
            
            $table->foreign('org_id')->references('id')->on('organizations');
            $table->foreign('station_id')->references('id')->on('stations');
            $table->foreign('cluster_id')->references('id')->on('clusters');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
