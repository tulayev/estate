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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->foreignId('subscriber_id')
                ->constrained('subscribers')
                ->onDelete('cascade');
            $table->foreignId('hotel_id')
                ->constrained('hotels')
                ->onDelete('cascade');
            $table->string('unsubscribe_token', 32)->unique();
            $table->timestamps();

            // one row per subscriber/hotel
            $table->unique(['subscriber_id','hotel_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
