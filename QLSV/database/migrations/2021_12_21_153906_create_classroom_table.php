<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom', function (Blueprint $table) {
            $table->string('classCode')->primary();
            $table->string('name');
            $table->string('subjectCodeClass')->nullable();
            $table->string('idTeacher');
            $table->timestamps();

            $table->foreign('subjectCodeClass')->references('subjectCode')->on('subjects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idTeacher')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classroom');
    }
}
