<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('org_id');
            // $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('manager_id');
            // $table->unsignedBigInteger('supervisor_id');
            $table->string('name');
            $table->string('location');
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('active')->nullable();
            // $table->string('no_of_clusters');
            // $table->string('no_of_pos');
            $table->timestamps();
            
            // $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('org_id')->references('id')->on('organizations');
            $table->foreign('manager_id')->references('id')->on('users');
            // $table->foreign('supervisor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
