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
        
            $table->integer('id')->autoIncrement()->nullable(false);
            $table->integer('user_id')->nullable(false);
            $table->text('content')->nullable(false);
            $table->boolean('is_public')->nullable(false)->default(true);
            $table->boolean('edited')->nullable(false)->default(true);
            $table->string('location')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            //constrains
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
