<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);

            $table->string('location');
            $table->string('num',20);
            $table->string('experience',20);

            $table->string('degree',20);
            $table->string('nature',20);
            $table->string('salary',50);

            $table->text('duty');//职责
            $table->text('requirement');//要求

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
        Schema::drop('recruits');
    }
}
