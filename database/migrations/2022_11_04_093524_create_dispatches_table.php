<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('org_id');
            $table->string('dispatcher_name');
            $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('d_company_id');
            $table->string('quantity_dispatched');
            $table->string('v_plate_number');
            $table->unsignedBigInteger('station_id');
            // $table->string('dispatch_company');
            $table->string('ref_id');
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->string('quantity_recieved')->nullable();
            $table->string('remark')->nullable();
            $table->string('status')->nullable();
            $table->string('dispatch_time')->nullable();
            $table->string('arival_time')->nullable();
            $table->timestamps();
            
            $table->foreign('org_id')->references('id')->on('organizations');
            $table->foreign('station_id')->references('id')->on('stations');
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('d_company_id')->references('id')->on('dispatch_companies');
            $table->foreign('manager_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatches');
    }
}
