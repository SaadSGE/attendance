<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDumpSqlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(file_get_contents("database/dump_sql/menus.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/roles.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/permissions.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/permission_role.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/users.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/role_user.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/country.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/divisions.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/districts.sql"));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
