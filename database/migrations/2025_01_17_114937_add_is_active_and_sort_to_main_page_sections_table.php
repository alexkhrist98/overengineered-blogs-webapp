<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('main_page_sections', function (Blueprint $table) {
            $table->boolean('is_active');
            $table->unsignedInteger('sort');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('main_page_sections', function (Blueprint $table) {
            $table->dropColumn('sort');
            $table->dropColumn('is_active');
        });
    }
};
