<?php namespace Zohan\Restic\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZohanResticDishes extends Migration
{
    public function up()
    {
        Schema::create('zohan_restic_dishes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 0)->default(1.00);
            $table->integer('category_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zohan_restic_dishes');
    }
}
