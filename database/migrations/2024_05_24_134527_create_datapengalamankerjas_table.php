<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDatapengalamankerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapengalamankerjas', function (Blueprint $table) {
            $table->id();
			$table->integer('user_id');
			$table->text('perusahaan');
			$table->text('jabatan_awal');
			$table->text('jabatan_terakhir');
			$table->integer('gaji_awal');
			$table->integer('gaji_akhir');
			$table->text('date_start');
			$table->text('date_end');
			$table->text('alasan_keluar');
			$table->text('surat_pengalaman');
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
        Schema::dropIfExists('datapengalamankerjas');
    }
}
