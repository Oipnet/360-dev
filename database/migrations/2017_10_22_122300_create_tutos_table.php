<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('content');
            $table->string('type');
            $table->string('slug')->unique();
            $table->string('image');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('tuto_user', function (Blueprint $table) {
            $table->integer('tuto_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });

        Schema::create('category_tuto', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('tuto_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutos');
    }
}
