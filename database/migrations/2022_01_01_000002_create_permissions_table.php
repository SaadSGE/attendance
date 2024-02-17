<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger("menu_id");

            $table->string('title')->nullable();

            $table->integer('created_by')->nullable();

            $table->integer('updated_by')->nullable();

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
        Schema::dropIfExists('permissions');
    }
}