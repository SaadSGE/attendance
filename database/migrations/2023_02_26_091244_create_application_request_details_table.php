<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationRequestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_request_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_request_id');
            $table->unsignedBigInteger('university_id');
            $table->integer('intake_id');
            $table->integer('year');
            $table->unsignedBigInteger('course_id');
            $table->text('notes')->nullable();
            $table->enum('status', ['Apply', 'Not Apply'])->default('Not Apply');
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('application_request_id')->references('id')->on('application_requests')->onDelete('cascade');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('course_names')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_request_details');
    }
}
