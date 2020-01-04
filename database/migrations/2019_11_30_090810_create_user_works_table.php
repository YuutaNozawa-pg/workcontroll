<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_work_list_id');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
            $table->string('start_time')->default(null)->nullable();
            $table->string('end_time')->default(null)->nullable();
            $table->string('over_time')->default(null)->nullable();
            $table->string('break_time')->default(null)->nullable();
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
        Schema::dropIfExists('user_works');
    }
}
