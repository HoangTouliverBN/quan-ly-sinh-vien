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
            $table->string('classCode');
            $table->integer('pointOne')->nullable();
            $table->integer('pointTwo')->nullable();
            $table->integer('pointDiscussion')->nullable();
            $table->integer('pointMidterm')->nullable();
            $table->integer('pointCondition')->nullable();
            $table->integer('pointFinal')->nullable();
            $table->timestamps();

            $table->foreign('studentCode')->references('studentCode')->on('students_information')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('classCode')->references('classCode')->on('classroom')
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
