<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePtkformtransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptkformtransactions', function (Blueprint $table) {
            $table->id();
			$table->integer('ptkform_id');
			$table->text('status');
			$table->integer('user_id');
            $table->dateTime('applicant')->nullable();
            $table->dateTime('interview_hc')->nullable();
            $table->dateTime('psikotest')->nullable();
            $table->dateTime('interview_user')->nullable();
            $table->dateTime('interview_direksi')->nullable();
            $table->dateTime('finalisasi')->nullable();
            $table->dateTime('mcu')->nullable();
            $table->dateTime('join')->nullable();
            $table->float('score_applicant')->nullable();
            $table->float('score_interview_hc')->nullable();
            $table->float('score_psikotest')->nullable();
            $table->float('score_interview_user')->nullable();
            $table->float('score_interview_direksi')->nullable();
            $table->float('score_finalisasi')->nullable();
            $table->float('score_mcu')->nullable();
            $table->float('score_join')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ptkformtransactions');
    }
}
