<?php

use Illuminate\Database\Migrations\Migration;

class ProjectsTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('tags', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('categories', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('taggables', function($table) {
            $table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->morphs('taggable');
        });
        Schema::create('categorables', function($table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->morphs('categorable');
        });
        Schema::create('projects', function($table){
        	$table->increments('id');
        	$table->integer('image_id')->unsigned();
        	$table->string('name');
        	$table->string('slug');
        	$table->text('description');
        	$table->string('url');
            $table->string('user_email');
            $table->string('user_twitter');
            $table->boolean('is_published')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_new')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('projects', function($table) {
            $table->index('slug');
            $table->index('name');
            $table->index('is_published');
            $table->index('is_featured');
            $table->index('is_new');
        });
        Schema::table('taggables', function($table) {
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
        Schema::table('categorables', function($table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::dropIfExists('taggables');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categorables');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('projects');
    }

}
