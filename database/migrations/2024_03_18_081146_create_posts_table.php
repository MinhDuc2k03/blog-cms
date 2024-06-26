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
            $table->bigInteger('author_id')->foreign('author_id')->references('id')->on('users');
            $table->string('slug', 255)->unique();
            $table->string('title', 255);
            $table->bigInteger('views')->default(0);
            $table->bigInteger('category_id')->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->mediumText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('post');
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
