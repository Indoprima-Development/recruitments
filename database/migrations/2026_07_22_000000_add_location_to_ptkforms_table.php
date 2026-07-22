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
        // Uses location_id (FK to the locations master table) rather than a free-text
        // string, to match how division_id/department_id/section_id/jobtitle_id work.
        if (!Schema::hasColumn('ptkforms', 'location_id')) {
            Schema::table('ptkforms', function (Blueprint $table) {
                $table->integer('location_id')->nullable()->after('jobtitle_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('ptkforms', 'location_id')) {
            Schema::table('ptkforms', function (Blueprint $table) {
                $table->dropColumn('location_id');
            });
        }
    }
};
