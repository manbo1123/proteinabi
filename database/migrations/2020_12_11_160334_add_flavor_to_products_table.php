<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Product\Condition;
use App\Enums\Product\Flavor;
class AddFlavorToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('condition', Condition::getValues()) -> default(Condition::Unknown);
            $table->enum('flavor', Flavor::getValues()) -> default(Flavor::Unknown);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('condition');
            $table->dropColumn('flavor');
        });
    }
}
