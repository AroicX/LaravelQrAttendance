<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table
                ->string('course_id')
                ->default([
                    1,
                    2,
                    3,
                    4,
                    5,
                    6,
                    7,
                    8,
                    9,
                    10,
                    11,
                    12,
                    13,
                    14,
                    15,
                    16,
                    17,
                    18,
                    19,
                    20,
                ]);
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('level')->nullable();
            $table->string('matric_no')->unique();
            $table
                ->string('gender')
                ->default('male')
                ->nullable();
            $table->string('phone')->nullable();
            $table->string('course')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('parent_number')->nullable();
            $table->string('password');
            $table->string('status')->default('Active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
