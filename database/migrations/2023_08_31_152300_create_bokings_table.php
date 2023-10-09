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
        Schema::create('bokings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id')->unsigned();
            $table->unsignedBigInteger('member_id')->unsigned();
            $table->integer('total_price');
            $table->integer('count');
            $table->enum('status', ['Accept','Reject', 'Pending'])->default('pending');
            $table->timestamps();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('member_id')->references('id')->on('members');
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
        Schema::dropIfExists('bokings');
    }
};
