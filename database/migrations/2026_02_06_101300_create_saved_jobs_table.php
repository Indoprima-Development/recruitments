<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSavedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('ptkform_id');
            $table->timestamps();

            // Prevent duplicate saves
            $table->unique(['user_id', 'ptkform_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_jobs');
    }
}
