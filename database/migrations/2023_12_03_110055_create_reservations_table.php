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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('car_id');
            $table->date('rezDate');
            $table->date('retDate');
            $table->integer('days');
            $table->decimal('price', 10, 2);
            $table->decimal('total', 10, 2);
            $table->text('note')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('payment_intent_id')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
