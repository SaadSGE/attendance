<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer("order_no");
            $table->integer("parent_id")->nullable();
            $table->string("menu_name",125);
            $table->string("bn_menu_name",125)->nullable();
            $table->string("menu_link",125);
            $table->string("slug",125);
            $table->string("menu_icon",64)->nullable();
            $table->enum("status",["Active","Inactive"])->default("Active");
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
        Schema::dropIfExists('menus');
    }
}