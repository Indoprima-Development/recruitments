<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMorePerformanceIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Every public vacancy page (MainController, VacancyApiController)
        // filters status + both vacancy dates together on every request.
        Schema::table('ptkforms', function (Blueprint $table) {
            $table->index(['status', 'date_open_vacancy', 'date_closed_vacancy'], 'ptkforms_status_dates_index');
            $table->index('jobtitle_id', 'ptkforms_jobtitle_id_index');
            $table->index('division_id', 'ptkforms_division_id_index');
            $table->index('department_id', 'ptkforms_department_id_index');
            $table->index('section_id', 'ptkforms_section_id_index');
        });

        if (Schema::hasColumn('ptkforms', 'location_id')) {
            Schema::table('ptkforms', function (Blueprint $table) {
                $table->index('location_id', 'ptkforms_location_id_index');
            });
        }

        // Joined/filtered per vacancy in MainController::showVacancy() and
        // VacancyApiController::listVacancies().
        Schema::table('ptkfields', function (Blueprint $table) {
            $table->index('ptkform_id', 'ptkfields_ptkform_id_index');
        });

        // AnalyticsController and PtkformtransactionsController::buildFilteredQuery()
        // filter ptkform_id+status and status+created_at together; the single-column
        // indexes added earlier don't cover either pair as well as a composite does.
        Schema::table('ptkformtransactions', function (Blueprint $table) {
            $table->index(['ptkform_id', 'status'], 'ptkformtransactions_ptkform_id_status_index');
            $table->index(['status', 'created_at'], 'ptkformtransactions_status_created_at_index');
        });

        // active_token isn't defined by any migration (added directly on the
        // live DB at some point), so guard against it not existing on a
        // fresh/dev schema.
        if (Schema::hasColumn('users', 'active_token')) {
            Schema::table('users', function (Blueprint $table) {
                $table->index('active_token', 'users_active_token_index');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ptkforms', function (Blueprint $table) {
            $table->dropIndex('ptkforms_status_dates_index');
            $table->dropIndex('ptkforms_jobtitle_id_index');
            $table->dropIndex('ptkforms_division_id_index');
            $table->dropIndex('ptkforms_department_id_index');
            $table->dropIndex('ptkforms_section_id_index');
        });

        if (Schema::hasColumn('ptkforms', 'location_id')) {
            Schema::table('ptkforms', function (Blueprint $table) {
                $table->dropIndex('ptkforms_location_id_index');
            });
        }

        Schema::table('ptkfields', function (Blueprint $table) {
            $table->dropIndex('ptkfields_ptkform_id_index');
        });

        Schema::table('ptkformtransactions', function (Blueprint $table) {
            $table->dropIndex('ptkformtransactions_ptkform_id_status_index');
            $table->dropIndex('ptkformtransactions_status_created_at_index');
        });

        if (Schema::hasColumn('users', 'active_token')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropIndex('users_active_token_index');
            });
        }
    }
}
