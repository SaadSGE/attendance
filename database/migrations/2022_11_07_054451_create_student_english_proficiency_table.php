<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnglishProficiencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_english_proficiency', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->integer('english_proficiency_id');
            $table->string('date_of_exam', 30);
            $table->float('listening')->nullable();
            $table->float('reading')->nullable();
            $table->float('writing')->nullable();
            $table->float('speaking')->nullable();
            $table->float('overall')->nullable();
            $table->string('cefr_level', 64)->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('student_english_proficiency');
    }
}
