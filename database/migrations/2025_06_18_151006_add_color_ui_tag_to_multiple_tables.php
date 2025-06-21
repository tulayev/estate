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
        Schema::table('tags', function (Blueprint $table) {
            $table->string('color_ui_tag', 50)->nullable();
        });
        
        Schema::table('types', function (Blueprint $table) {
            $table->string('color_ui_tag', 50)->nullable();
        });
        
        Schema::table('topic_categories', function (Blueprint $table) {
            $table->string('color_ui_tag', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('color_ui_tag');
        });
        
        Schema::table('types', function (Blueprint $table) {
            $table->dropColumn('color_ui_tag');
        });
        
        Schema::table('topic_categories', function (Blueprint $table) {
            $table->dropColumn('color_ui_tag');
        });
    }
};
