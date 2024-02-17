<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityEducationRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_education_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id');
            $table->integer('study_type_id');
            $table->string('cgpa', 64);
            $table->decimal('percentage', 10, 2)->nullable();
            $table->tinyInteger('marking_method');
            $table->string('grading', 20);
            $table->float('out_of');
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
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
        Schema::dropIfExists('university_education_requirements');
    }
}
