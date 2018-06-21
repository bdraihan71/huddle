<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('pin')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('address');
            $table->integer('branch_id');
            $table->string('status');
            $table->string('category');
            $table->string('religion');
            $table->string('employee_id');
            $table->date('joining_date');
            $table->text('img_url');
            $table->rememberToken();
            $table->boolean('logged_in')->nullable();
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
        Schema::dropIfExists('users');
    }
}
