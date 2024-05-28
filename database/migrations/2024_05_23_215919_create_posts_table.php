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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_title')->nullable();
            $table->string('post_slug')->nullable();
            $table->string('post_excerpt')->nullable();
            $table->longText('post_content')->nullable();
            $table->string('post_thumbnail')->nullable();
            $table->bigInteger('post_views')->nullable();
            $table->foreignId('category_id')->on('categories')->constrained();
            $table->foreignId('user_id')->on('users')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
