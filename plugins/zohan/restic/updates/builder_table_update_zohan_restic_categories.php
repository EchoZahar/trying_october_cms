<?php namespace Zohan\Restic\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZohanResticCategories extends Migration
{
    public function up()
    {
        Schema::table('zohan_restic_categories', function($table)
        {
            $table->integer('parent_id')->nullable()->change();
            $table->integer('nest_left')->nullable()->change();
            $table->integer('nest_right')->nullable()->change();
            $table->integer('nest_depth')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('zohan_restic_categories', function($table)
        {
            $table->integer('parent_id')->nullable(false)->change();
            $table->integer('nest_left')->nullable(false)->change();
            $table->integer('nest_right')->nullable(false)->change();
            $table->integer('nest_depth')->nullable(false)->change();
        });
    }
}
