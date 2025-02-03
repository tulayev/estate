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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->json('description');
            $table->string('codename')->nullable();
            $table->json('location');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('price', 11, 3);
            $table->string('main_image')->nullable();
            $table->json('gallery')->nullable();
            $table->string('main_image_url')->nullable();
            $table->text('gallery_url')->nullable();
            $table->boolean('active')->default(false);
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('moonshine_users')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
