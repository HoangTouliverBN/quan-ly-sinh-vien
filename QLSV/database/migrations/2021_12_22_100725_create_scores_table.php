<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string('studentCode');
            $table->string('subjectCode');
            $table->bigInteger('idTeacher')->unsigned();
            $table->string('classCode');
            $table->integer('pointOne');
            $table->integer('pointTwo');
            $table->integer('pointDiscussion');
            $table->integer('pointMidterm');
            $table->integer('pointCondition');
            $table->integer('pointFinal');
            $table->timestamps();

            $table->foreign('studentCode')->references('studentCode')->on('students_information')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('subjectCode')->references('subjectCode')->on('subjects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('classCode')->references('classCode')->on('classroom')
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
        Schema::dropIfExists('scores');
    }
}
