<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discipline_id');
            $table->unsignedBigInteger('sub_discipline_id')->nullable();
            $table->string('course_name');
            $table->string('image_url', 125)->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('discipline_id')->references('id')->on('disciplines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_names');
    }
}