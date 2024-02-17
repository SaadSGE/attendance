<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_employments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('department_id');

            $table->string('employeer', 64);
            $table->string('position', 125);
            $table->string('from_date', 20);
            $table->string('to_date', 20)->nullable();
            $table->text('responsibilities');
            $table->boolean('present');
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('sub_disciplines')->onDelete('cascade');
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
        Schema::dropIfExists('student_employments');
    }
}