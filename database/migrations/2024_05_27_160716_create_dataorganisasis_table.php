<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDataorganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataorganisasis', function (Blueprint $table) {
            $table->id();
			$table->integer('user_id');
			$table->text('nama_organisasi');
			$table->text('tingkat');
			$table->text('start_date');
			$table->text('end_date');
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
        Schema::dropIfExists('dataorganisasis');
    }
}
