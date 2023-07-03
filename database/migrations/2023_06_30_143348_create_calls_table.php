<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('outgoing_number_id');
            $table->unsignedBigInteger('incoming_number_id');
            $table->unsignedBigInteger('operator_id');
            $table->foreign('outgoing_number_id')->references('id')->on('phone_numbers');
            $table->foreign('incoming_number_id')->references('id')->on('phone_numbers');
            $table->foreign('operator_id')->references('id')->on('operators');
            $table->dateTime('call_date');
            $table->integer('call_duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};
