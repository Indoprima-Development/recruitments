<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recruitment_externals', function (Blueprint $table) {
            $table->id();
            $table->string('no')->nullable();
            $table->string('nama')->nullable();
            $table->string('month_1')->nullable();
            $table->string('connect_sent')->nullable();
            $table->string('connected')->nullable();
            $table->string('approached')->nullable();
            $table->string('responded')->nullable();
            $table->string('level')->nullable();
            $table->string('position')->nullable();
            $table->string('plant_division')->nullable();
            $table->string('level_pendidikan')->nullable();
            $table->string('campus')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('sumber')->nullable();
            $table->string('pic')->nullable();
            
            $table->date('date_1')->nullable();
            $table->text('result_note_1')->nullable();
            
            $table->date('date_2')->nullable();
            $table->text('result_note_2')->nullable();
            
            $table->date('date_3')->nullable();
            $table->text('result_note_3')->nullable();
            
            $table->date('date_4')->nullable();
            $table->string('month_2')->nullable();
            $table->text('result_note_4')->nullable();
            
            $table->date('date_5')->nullable();
            $table->text('result_director')->nullable();
            
            $table->string('interview')->nullable();
            $table->string('connect')->nullable();
            $table->string('approach')->nullable();
            $table->string('committee')->nullable();
            $table->string('ok')->nullable();
            $table->string('experience')->nullable();
            $table->string('technical')->nullable();
            $table->string('psikotes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_externals');
    }
};
