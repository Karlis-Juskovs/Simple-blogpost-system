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
            $table->id();
            $table->text('content')->nullable(false);
            $table->unsignedBigInteger('owner_id')->nullable(false);
            $table->unsignedBigInteger('blog_post_id')->nullable(false);
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('blog_post_id')->references('id')->on('blog_posts');
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
