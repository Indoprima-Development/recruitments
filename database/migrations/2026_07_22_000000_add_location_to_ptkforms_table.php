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
        if (!Schema::hasColumn('ptkforms', 'location')) {
            Schema::table('ptkforms', function (Blueprint $table) {
                $table->string('location')->nullable()->after('jobtitle_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('ptkforms', 'location')) {
            Schema::table('ptkforms', function (Blueprint $table) {
                $table->dropColumn('location');
            });
        }
    }
};
