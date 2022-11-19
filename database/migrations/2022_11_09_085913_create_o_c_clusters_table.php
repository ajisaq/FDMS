<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOCClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_c_clusters', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->unsignedBigInteger('cluster_id');
            $table->unsignedBigInteger('c_sub_id');
            $table->unsignedBigInteger('o_c_station_id');
            $table->string('m_reading')->nullable();
            $table->string('time');
            $table->timestamps();

            $table->foreign('cluster_id')->references('id')->on('clusters');
            $table->foreign('o_c_station_id')->references('id')->on('o_c_stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('o_c_clusters');
    }
}
