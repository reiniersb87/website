<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('taggables', 'projects_taggables');
        Schema::rename('categorables', 'projects_categoryables');
        Schema::table('projects_categoryables', function($table){
            $table->renameColumn('category_id', 'project_category_id');
            $table->renameColumn('categorable_id', 'projects_categoryables_id');
            $table->renameColumn('categorable_type', 'projects_categoryables_type');
        });
        Schema::table('projects_taggables', function($table){
            $table->renameColumn('tag_id', 'project_tag_id');
            $table->renameColumn('taggable_id', 'projects_taggable_id');
            $table->renameColumn('taggable_type', 'projects_taggable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('projects_taggables', 'taggables');
        Schema::rename('projects_categoryables', 'categorables');
        Schema::table('categorables', function($table){
            $table->renameColumn('project_category_id', 'category_id');
            $table->renameColumn('projects_categoryables_id', 'categorable_id');
            $table->renameColumn('projects_categoryables_type', 'categorable_type');
        });
        Schema::table('taggables', function($table){
            $table->renameColumn('project_tag_id', 'tag_id');
            $table->renameColumn('projects_taggable_id', 'taggable_id');
            $table->renameColumn('projects_taggable_type', 'taggable_type');
        });
    }
}
