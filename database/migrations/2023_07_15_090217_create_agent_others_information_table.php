<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentOthersInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_others_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->string('account_holder_name',225)->nullable();
            $table->string('account_number',225)->nullable();
            $table->string('bank_name',125)->nullable();
            $table->string('branch_name',125)->nullable();
            $table->string('branch_address',125)->nullable();
            $table->string('branch_contact_number',64)->nullable();
            $table->string('branch_email',125)->nullable();
            $table->string('branch_code',64)->nullable();
            $table->string('swift_code',64)->nullable();
            $table->string('routing_number',64)->nullable();
            $table->string('district',64)->nullable();
            $table->integer('country_id')->nullable();
            $table->string('referance_institution_name',125)->nullable();
            $table->string('referance_contact_name',125)->nullable();
            $table->string('referance_city_country',64)->nullable();
            $table->string('referance_phone_no',32)->nullable();
            $table->string('referance_email_address',32)->nullable();
            $table->integer('how_many_offices_do_you_have')->nullable();
            $table->string('which_cities_do_you_have_offices_in',64)->nullable();
            $table->integer('when_was_your_agency_established')->nullable();
            $table->string('which_countries_do_you_recruit_students_from',64)->nullable();
            $table->integer('how_did_you_learn_about_us')->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_others_information');
    }
}