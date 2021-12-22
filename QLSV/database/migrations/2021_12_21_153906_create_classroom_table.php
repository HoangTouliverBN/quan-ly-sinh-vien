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
            $table->string('studentCodeClass');

            $table->string('subjectCodeClass');
            $table->bigInteger('idTeacher')->unsigned();
            $table->timestamps();

            $table->foreign('studentCodeClass')->references('studentCode')->on('students_information')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
