<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateExamTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_transactions', function (Blueprint $table) {
            $table->id();
			$table->integer('exam_id');
			$table->integer('user_id');
			$table->boolean('is_open');
			$table->integer('score');
            $table->float('time_remaining');
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
        Schema::dropIfExists('exam_transactions');
    }
}
