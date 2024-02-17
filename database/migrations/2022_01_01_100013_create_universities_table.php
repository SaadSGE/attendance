<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->integer('order_no');
            $table->enum('is_featured', ['Yes', 'No'])->default('No');
            $table->integer('country_id');
            $table->string('university_name', 125);
            $table->string('city_name', 125);
            $table->string('slug', 125);
            $table->integer('estd_year')->nullable();
            $table->enum('institution', ['Public', 'Private'])->default('Public');
            $table->integer('group_id')->nullable();
            $table->string('location', 125)->nullable();
            $table->float('cost_of_living')->default(0);
            $table->float('distance')->default(0);
            $table->string('latitude', 125)->nullable();
            $table->string('longitude', 125)->nullable();
            $table->text('google_map')->nullable();
            $table->string('youtube_video', 125)->nullable();
            $table->string('website', 125)->nullable();
            $table->string('logo', 125)->nullable();
            $table->string('banner', 125)->nullable();
            $table->string('campus_photo', 125)->nullable();
            $table->integer("created_by")->nullable();
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
        Schema::dropIfExists('universities');
    }
}