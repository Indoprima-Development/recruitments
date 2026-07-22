<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE ptkforms ALTER COLUMN responsibility NVARCHAR(MAX) NULL');
        DB::statement('ALTER TABLE ptkforms ALTER COLUMN special_conditions NVARCHAR(MAX) NULL');
        DB::statement('ALTER TABLE ptkforms ALTER COLUMN general_others NVARCHAR(MAX) NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE ptkforms ALTER COLUMN responsibility NVARCHAR(MAX) NOT NULL');
        DB::statement('ALTER TABLE ptkforms ALTER COLUMN special_conditions NVARCHAR(MAX) NOT NULL');
        DB::statement('ALTER TABLE ptkforms ALTER COLUMN general_others NVARCHAR(MAX) NOT NULL');
    }
};
