<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads_website', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->string('first_name', 125);
            $table->string('last_name', 125);
            $table->string('phone', 30);
            $table->string('phonecode', 10)->nullable();
            $table->string('phonedata', 10)->nullable();
            $table->string('email', 125);
            $table->integer('study_type_id');
            $table->string('study_type_id_other', 125)->nullable();
            $table->string('session', 125);
            $table->integer('course_id');
            $table->string('course_id_other', 125)->nullable();
            $table->integer('university_id');
            $table->string('university_id_other', 125)->nullable();
            $table->integer('degree_id');
            $table->string('degree_id_other', 125)->nullable();
            $table->integer('english_proficiency_id')->nullable();
            $table->string('english_proficiency_id_other', 125)->nullable();
            $table->string('english_proficiency_id_score', 125)->nullable();
            $table->integer('media_id');
            $table->enum('ukres', ['Yes', 'No'])->default('No');
            $table->unsignedBigInteger('branch_id');
            $table->integer('chk_consent');
            $table->integer("created_by");
            $table->integer("updated_by")->nullable();
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
        Schema::dropIfExists('leads_website');
    }
}