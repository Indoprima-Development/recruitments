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
        if (!Schema::hasColumn('ptkformtransactions', 'ai_score')) {
            Schema::table('ptkformtransactions', function (Blueprint $table) {
                $table->float('ai_score')->nullable()->after('score_join');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('ptkformtransactions', 'ai_score')) {
            Schema::table('ptkformtransactions', function (Blueprint $table) {
                $table->dropColumn('ai_score');
            });
        }
    }
};
