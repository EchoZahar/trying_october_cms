<?php namespace Zohan\Restic\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * ModifyZohanResicDishesTableAddCurrencyColumnsTable Migration
 */
class ModifyZohanResicDishesTableAddCurrencyColumnsTable extends Migration
{
    public function up()
    {
        Schema::table('zohan_restic_dishes', function (Blueprint $table) {
            $table->string('price')->change();
        });
    }

    public function down()
    {
        Schema::table('zohan_restic_dishes', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->change();
        });
    }
}
