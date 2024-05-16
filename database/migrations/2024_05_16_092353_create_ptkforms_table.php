<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePtkformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptkforms', function (Blueprint $table) {
            $table->id();
			$table->integer('division_id');
			$table->integer('department_id');
			$table->integer('section_id');
			$table->integer('jobtitle_id');
			$table->integer('education_id');
			$table->integer('major_id');
			$table->text('date_startwork');
			$table->text('direct_superior');
			$table->text('direct_junior');
			$table->text('responsibility');
			$table->boolean('gender');
			$table->float('ipk');
			$table->text('special_conditions');
			$table->text('general_others');
			$table->text('request_basis');
			$table->text('request_basis_for');
			$table->integer('status');
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
        Schema::dropIfExists('ptkforms');
    }
}
