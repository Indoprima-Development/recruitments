<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDatapendidikannonformalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapendidikannonformals', function (Blueprint $table) {
            $table->id();
			$table->integer('user_id');
			$table->text('jenis');
			$table->text('tingkat');
			$table->text('instansi');
			$table->text('jurusan');
			$table->text('date_start');
			$table->text('date_end');
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
        Schema::dropIfExists('datapendidikannonformals');
    }
}
