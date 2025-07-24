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
        Schema::create('messages_media', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->nullable(false);
            $table->integer('message_id')->nullable(false);
            $table->string('media_url')->nullable(false);
            $table->string('media_type')->nullable(false);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign(('message_id'))->references('id')->on('messages')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages_media');
    }
};
