<?php namespace Zohan\Restic\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateDishesTable Migration
 */
class CreateDishesTable extends Migration
{
    public function up()
    {
        Schema::create('zohan_restic_dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->increments('category_id');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('zohan_restic_dishes');
    }
}
