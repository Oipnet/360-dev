<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        Schema::table('post_user', function (Blueprint $table) {
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('tuto_user', function (Blueprint $table) {
            $table->foreign('tuto_id')
                ->references('id')
                ->on('tutos')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });

        Schema::table('category_tuto', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('tuto_id')
                ->references('id')
                ->on('tutos')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIfExists('category_id');
            $table->dropIfExists('user_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIfExists('role_id');
        });

        Schema::table('post_user', function (Blueprint $table) {
            $table->dropIfExists('post_id');
            $table->dropIfExists('user_id');
        });

        Schema::table('tuto_user', function (Blueprint $table) {
            $table->dropIfExists('tuto_id');
            $table->dropIfExists('user_id');
        });

        Schema::table('category_tuto', function (Blueprint $table) {
            $table->dropIfExists('category_id');
            $table->dropIfExists('tuto_id');
        });
    }
}
