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
        Schema::create('hotel_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')
                ->constrained('hotels')
                ->onDelete('cascade');
            $table->foreignId('liked_by')
                ->nullable()
                ->constrained('moonshine_users')
                ->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();

            $table->unique(['hotel_id', 'liked_by']); // Unique for authenticated users
            $table->unique(['hotel_id', 'ip_address']); // Unique for unauthenticated users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
