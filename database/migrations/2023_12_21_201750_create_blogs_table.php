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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // The title of the blog post
            $table->longText('bcontent'); // The content or body of the blog post
            $table->string('m_title'); // A unique slug for SEO-friendly URLs
            $table->string('m_content'); // A unique slug for SEO-friendly URLs
            $table->string('keyword'); // A unique slug for SEO-friendly URLs
            $table->string('image')->nullable(); // Path to the featured image
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
