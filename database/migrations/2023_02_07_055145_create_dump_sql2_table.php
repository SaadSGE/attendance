<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDumpSql2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(file_get_contents("database/dump_sql/english_proficiencies.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/designations.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/disciplines.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/sub_disciplines.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/course_names.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/degree_names.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/institute_names.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/intakes.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/intake_status.sql"));
        DB::unprepared(file_get_contents("database/dump_sql/tasks.sql"));
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
