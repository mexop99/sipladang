<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enter_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('distributor_id')->unsigned()->nullable();
            $table->bigInteger('vehicle_id')->unsigned()->nullable();
            $table->string('plat_number');
            $table->dateTime('enter_date');
            $table->string('name');
            $table->string('desc')->nullable();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('distributor_id')->references('id')->on('distributors');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enter_product', function(Blueprint $table){
            $table->dropForeign('enter_product_distributor_id_foreign');
            $table->dropForeign('enter_product_vehicle_id_foreign');
            $table->dropForeign('enter_product_created_by_foreign');
            $table->dropForeign('enter_product_updated_by_foreign');
            $table->dropForeign('enter_product_deleted_by_foreign');
        });
        Schema::dropIfExists('enter_product');
    }
}
