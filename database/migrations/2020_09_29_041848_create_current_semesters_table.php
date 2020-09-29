<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_semesters', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year');
            $table->string('semester');
            $table->string('sem_str');
            $table->dateTime('started_at');
            $table->dateTime('ended_at')->nullable();
            $table->boolean('is_current');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('current_semesters');
    }
}
