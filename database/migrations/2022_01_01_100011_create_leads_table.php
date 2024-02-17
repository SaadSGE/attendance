<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('reg_date', 125)->nullable();
            $table->unsignedBigInteger('branch_id');
            $table->string('name', 125)->nullable();
            $table->string('email', 125)->nullable();
            $table->string('phone1', 30)->nullable();
            $table->string('phone2', 30)->nullable();
            $table->string('university', 225)->nullable();
            $table->string('level', 125)->nullable();
            $table->string('course', 125)->nullable();
            $table->string('english', 125)->nullable();
            $table->string('country')->nullable();
            $table->string('source', 64)->nullable();
            $table->unsignedBigInteger('counsellor_id')->nullable();
            $table->string('lead_update', 125)->nullable();
            $table->string('last_contact', 125)->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
