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
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("car_id");
            $table->string("subject");
            $table->float("rate")->default(2.5);
            $table->string("status")->default("INACTIVE");
            $table->string("type")->default("COMMENT"); //COMMENT,REPLY
            $table->unsignedBigInteger("comment_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("car_id")->references("id")->on("cars");
            $table->foreign("comment_id")->references("id")->on("comments");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
