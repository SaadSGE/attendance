<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id');

            $table->unsignedBigInteger('course_name_id');

            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->foreign('course_name_id')->references('id')->on('course_names')->onDelete('cascade');
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
        Schema::dropIfExists('university_courses');
    }
}