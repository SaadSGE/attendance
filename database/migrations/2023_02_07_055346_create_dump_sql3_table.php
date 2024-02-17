<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDumpSql3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared(file_get_contents("database/dump_sql/application_status.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/lead_status.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/universities.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/branches.sql"));
        /*DB::unprepared(file_get_contents("database/dump_sql/leads.sql"));*/
        DB::unprepared(file_get_contents("database/dump_sql/study_types.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/university_about.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/media_names.sql"));
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
