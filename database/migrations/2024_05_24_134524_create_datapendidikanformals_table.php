<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDatapendidikanformalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapendidikanformals', function (Blueprint $table) {
            $table->id();
			$table->integer('user_id');
			$table->text('tingkat');
			$table->text('instansi');
			$table->text('jurusan');
			$table->text('lulus_tahun');
			$table->text('nilai');
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
        Schema::dropIfExists('datapendidikanformals');
    }
}
