<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boking_id')->unsigned();
            $table->unsignedBigInteger('employe_id')->unsigned();
            $table->timestamps();
            $table->foreign('boking_id')->references('id')->on('bokings');
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sails');
    }
};
