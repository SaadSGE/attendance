<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_student_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_student_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('counsellor_id');
            $table->text('student_id');
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->foreign('transfer_student_id')->references('id')->on('transfer_students')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('counsellor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('transfer_student_details');
    }
}