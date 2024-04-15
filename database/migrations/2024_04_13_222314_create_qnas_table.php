<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateQnasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qnas', function (Blueprint $table) {
            $table->id();
			$table->integer('exam_id');
			$table->integer('user_id');
			$table->text('question');
			$table->text('answer1');
			$table->text('answer2');
			$table->text('answer3');
			$table->text('answer4');
			$table->text('answer5');
			$table->integer('key');
			$table->text('question_img');
			$table->text('answer1_img');
			$table->text('answer2_img');
			$table->text('answer3_img');
			$table->text('answer4_img');
			$table->text('answer5_img');
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
        Schema::dropIfExists('qnas');
    }
}
