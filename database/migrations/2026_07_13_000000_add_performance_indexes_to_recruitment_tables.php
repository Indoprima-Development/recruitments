<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPerformanceIndexesToRecruitmentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // status was NVARCHAR(MAX) (text), which SQL Server cannot index.
        // Observed values are short numeric codes ('0'..'10') plus a rare stray
        // label (e.g. "Interviewing"), longest seen is 12 chars, so 20 leaves headroom.
        DB::statement('ALTER TABLE ptkformtransactions ALTER COLUMN status NVARCHAR(20) NOT NULL');

        Schema::table('ptkformtransactions', function (Blueprint $table) {
            $table->index('user_id', 'ptkformtransactions_user_id_index');
            $table->index('ptkform_id', 'ptkformtransactions_ptkform_id_index');
            $table->index('created_at', 'ptkformtransactions_created_at_index');
            $table->index('status', 'ptkformtransactions_status_index');
        });

        Schema::table('datapendidikanformals', function (Blueprint $table) {
            $table->index(['user_id', 'id'], 'datapendidikanformals_user_id_id_index');
        });

        Schema::table('datapengalamankerjas', function (Blueprint $table) {
            $table->index('user_id', 'datapengalamankerjas_user_id_index');
        });

        Schema::table('datadiris', function (Blueprint $table) {
            $table->index('user_id', 'datadiris_user_id_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ptkformtransactions', function (Blueprint $table) {
            $table->dropIndex('ptkformtransactions_user_id_index');
            $table->dropIndex('ptkformtransactions_ptkform_id_index');
            $table->dropIndex('ptkformtransactions_created_at_index');
            $table->dropIndex('ptkformtransactions_status_index');
        });

        Schema::table('datapendidikanformals', function (Blueprint $table) {
            $table->dropIndex('datapendidikanformals_user_id_id_index');
        });

        Schema::table('datapengalamankerjas', function (Blueprint $table) {
            $table->dropIndex('datapengalamankerjas_user_id_index');
        });

        Schema::table('datadiris', function (Blueprint $table) {
            $table->dropIndex('datadiris_user_id_index');
        });

        DB::statement('ALTER TABLE ptkformtransactions ALTER COLUMN status NVARCHAR(MAX) NOT NULL');
    }
}
