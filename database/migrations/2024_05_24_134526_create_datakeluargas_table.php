<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDatakeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datakeluargas', function (Blueprint $table) {
            $table->id();
			$table->integer('user_id');
			$table->text('status_hubungan');
			$table->text('nama_keluarga');
			$table->text('tempat_lahir_keluarga');
			$table->text('tanggal_lahir_keluarga');
			$table->text('pekerjaan');
			$table->text('alamat');
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
        Schema::dropIfExists('datakeluargas');
    }
}
