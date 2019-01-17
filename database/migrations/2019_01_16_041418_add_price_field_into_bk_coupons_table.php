<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceFieldIntoBkCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bk_coupons', function (Blueprint $table) {
            $table->smallInteger('price')->default(0);
            $table->smallInteger('actual_price')->default(0);
            $table->string('extra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bk_coupons', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('actual_price');
            $table->dropColumn('extra');
        });
    }
}
