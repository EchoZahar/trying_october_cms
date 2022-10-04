<?php namespace Zohan\Restic\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZohanResticDishes2 extends Migration
{
    public function up()
    {
        Schema::table('zohan_restic_dishes', function($table)
        {
            $table->boolean('is_published')->default(0)->after('price');
        });
    }
    
    public function down()
    {
        Schema::table('zohan_restic_dishes', function($table)
        {
            $table->dropColumn('is_published');
        });
    }
}
