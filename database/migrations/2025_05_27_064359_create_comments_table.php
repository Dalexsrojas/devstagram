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
            $table->integer('id')->autoIncrement()->nullable(false);
            $table->integer('post_id')->nullable(false);
            $table->integer('user_id')->nullable(false);
            $table->integer('parent_comment_id')->nullable(false);
            $table->text('content')->nullable(false);
            $table->boolean('edited')->nullable(false);
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign('parent_comment_id')->references('id')->on('comments')->onDelete('cascade');
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
