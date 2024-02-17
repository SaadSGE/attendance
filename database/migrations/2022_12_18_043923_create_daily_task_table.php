<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('counsellor_id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->integer('intake_id')->nullable();
            $table->integer('year')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string("task_date", 20);
            $table->text("task_details")->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('counsellor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('course_names')->onDelete('cascade');
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
        Schema::dropIfExists('daily_task');
    }
}
