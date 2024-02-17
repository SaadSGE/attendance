<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityIntakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_intakes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('university_id');

            $table->integer('year');
            $table->unsignedBigInteger('intake_id');
            $table->integer('intake_status');
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->foreign('intake_id')->references('id')->on('intakes')->onDelete('cascade');
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
        Schema::dropIfExists('university_intakes');
    }
}