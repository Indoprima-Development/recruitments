<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDatadirisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datadiris', function (Blueprint $table) {
            $table->id();
			$table->integer('user_id');
			$table->text('name');
			$table->boolean('gender');
			$table->text('tempat_lahir');
			$table->text('tanggal_lahir');
			$table->text('agama');
			$table->text('alamat');
			$table->text('no_hp');
			$table->text('no_wa');
			$table->text('status_rumah');
			$table->text('golongan_darah');
			$table->float('tinggi_badan');
			$table->float('berat_badan');
			$table->text('ktp');
			$table->text('kendaraan');
			$table->text('sim');
			$table->integer('ekspektasi_gaji');
			$table->text('fasilitas_harapan');
			$table->text('kesediaan_penempatan');
			$table->text('kesediaan_mulai_bekerja');
			$table->text('image_jabatan_terakhir');
			$table->text('keterangan_jabatan_terakhir');
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
        Schema::dropIfExists('datadiris');
    }
}
