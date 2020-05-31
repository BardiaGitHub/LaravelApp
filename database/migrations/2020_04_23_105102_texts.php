<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Texts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pocr_texts', function (Blueprint $table) {
            $table->string('id');
            $table->bigInteger('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('pocr_users');
            $table->string('text');
            $table->string('date');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
