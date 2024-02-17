<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('counsellor_id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('intake_id');
            $table->string('intake_ids', 10);
            $table->unsignedInteger('prefix');
            $table->unsignedInteger('serial'); //->zerofill();
            $table->string('application_date', 10);
            $table->string('submitted_date', 10)->nullable();
            $table->integer('year');
            $table->integer('status')->default(1);
            $table->string('document_3', 125)->nullable();
            $table->string('document_4', 125)->nullable();
            $table->string('document_9', 125)->nullable();
            $table->float('partial_paid')->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('counsellor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('course_names')->onDelete('cascade');
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
        Schema::dropIfExists('applications');
    }
}
