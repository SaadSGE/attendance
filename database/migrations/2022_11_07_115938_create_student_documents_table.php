<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('passport', 125)->nullable();
            $table->string('transcript_1', 125)->nullable();
            $table->string('transcript_2', 125)->nullable();
            $table->string('transcript_3', 125)->nullable();
            $table->string('transcript_4', 125)->nullable();
            $table->string('transcript_5', 125)->nullable();
            $table->string('certificate_1', 125)->nullable();
            $table->string('certificate_2', 125)->nullable();
            $table->string('certificate_3', 125)->nullable();
            $table->string('certificate_4', 125)->nullable();
            $table->string('certificate_5', 125)->nullable();
            $table->string('toefl', 125)->nullable();
            $table->string('ielts', 125)->nullable();
            $table->string('duolingo', 125)->nullable();
            $table->string('pte', 125)->nullable();
            $table->string('oietc', 125)->nullable();
            $table->string('moi', 125)->nullable();
            $table->string('academic_reference', 125)->nullable();
            $table->string('professional_reference', 125)->nullable();
            $table->string('cv', 125)->nullable();
            $table->string('sop', 125)->nullable();
            $table->string('supporting_document', 125)->nullable();
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
        Schema::dropIfExists('student_documents');
    }
}