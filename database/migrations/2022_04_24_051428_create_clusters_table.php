<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clusters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('org_id');
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('cluster_type_id');
            $table->unsignedBigInteger('supervisor_id')->nullable();
            // $table->string('name');
            // $table->string('description');
            $table->string('type');
            $table->timestamps();
            
            $table->foreign('org_id')->references('id')->on('organizations');
            $table->foreign('station_id')->references('id')->on('stations');
            $table->foreign('cluster_type_id')->references('id')->on('cluster_types');
            $table->foreign('supervisor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clusters');
    }
}
