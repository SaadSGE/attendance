<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityEnglishProficiencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_english_proficiency', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('university_id');

            $table->integer('english_proficiency_id');
            $table->float('listening')->nullable();
            $table->float('reading')->nullable();
            $table->float('writing')->nullable();
            $table->float('speaking')->nullable();
            $table->float('overall')->nullable();
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
        Schema::dropIfExists('university_english_proficiency');
    }
}