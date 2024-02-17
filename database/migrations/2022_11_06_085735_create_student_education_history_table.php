<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEducationHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_education_history', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('discipline_id');
            $table->integer('degree_id');
            $table->integer('institute_id');
            $table->string('from_date', 20);
            $table->string('to_date', 20);
            $table->integer('passing_year');
            $table->string('cgpa', 64);
            $table->decimal('percentage', 10, 2)->nullable();
            $table->tinyInteger('marking_method');
            $table->string('grading', 20);
            $table->float('out_of');
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('discipline_id')->references('id')->on('disciplines')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_education_history');
    }
}