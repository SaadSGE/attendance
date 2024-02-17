<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->integer('division_id')->default(0);
            $table->string('branch_name', 64);
            $table->string('branch_code', 10);
            $table->string('address', 225);
            $table->string('contact_no', 32);
            $table->string('email', 64);
            $table->string('latitude', 125)->nullable();
            $table->string('longitude', 125)->nullable();
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
        Schema::dropIfExists('branches');
    }
}
