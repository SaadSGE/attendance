<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('prefix');

            $table->unsignedInteger('serial'); // unsignedInteger 4, zerofilled

            $table->string('first_name', 64)->nullable();
            $table->string('last_name', 64)->nullable();
            $table->string('name', 125)->nullable();
            $table->string('date_of_birth', 12)->nullable();
            $table->string('mobile_no', 32)->nullable();
            $table->string('address', 125)->nullable();
            $table->string('passport_no', 64)->nullable();
            $table->string('passport_expiry_date', 15)->nullable();

            $table->unsignedInteger('role_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('counsellor_id')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();

            $table->integer('citizen_id')->nullable();

            $table->string('email');
            $table->string('maritial_status', 15)->nullable();
            $table->string('gender', 15)->nullable();
            $table->string('zip_code', 64)->nullable();
            $table->string('city', 64)->nullable();
            $table->string('state', 64)->nullable();
            $table->string('photo', 64)->nullable();
            $table->enum('profile', ['Complete', 'In Complete'])->default('In Complete');
            $table->text('acls')->nullable();
            $table->enum('origin', ['Default', 'Transfer'])->default('Default');

            $table->datetime('email_verified_at')->nullable();

            $table->string('password');

            $table->string('human_password')->nullable();
            $table->enum('status', ['0', '1', '2'])->default('0');

            $table->string('remember_token')->nullable();

            $table->integer("created_by")->nullable();

            $table->integer("updated_by")->nullable();

            $table->timestamps();

            $table->softDeletes();

            //  $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            //  $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');

        });
    }
}
