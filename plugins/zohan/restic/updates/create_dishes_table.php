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
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->boolean('is_published')->default(false);
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('zohan_restic_categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('zohan_restic_dishes');
    }
}
