<?php namespace Zohan\Restic\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZohanResticDishes extends Migration
{
    public function up()
    {
        Schema::table('zohan_restic_dishes', function($table)
        {
            $table->decimal('price', 10, 2)->change();
        });
    }
    
    public function down()
    {
        Schema::table('zohan_restic_dishes', function($table)
        {
            $table->decimal('price', 10, 0)->change();
        });
    }
}
