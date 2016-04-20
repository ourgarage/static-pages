<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static-pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->content('text');
            $table->string('slug');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->string('meta_title');
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
        Schema::drop('static-pages');
    }
}