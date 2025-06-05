<?php

use App\Helpers\Enums\TopicType;
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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('slug')->unique();
            $table->json('body');
            $table->json('main_ideas')->nullable();
            $table->unsignedInteger('minutes_to_read')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('active')->default(false);
            $table->enum('type', TopicType::values())->nullable();
            $table->foreignId('topic_category_id')
                ->nullable()
                ->constrained('topic_categories')
                ->nullOnDelete();
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
        Schema::dropIfExists('topics');
    }
};
