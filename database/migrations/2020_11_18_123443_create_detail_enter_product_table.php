<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEnterProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_enter_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('enter_product_id')->unsigned()->nullable();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->integer('qty');
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('enter_product_id')->references('id')->on('enter_product');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::table('detail_enter_product', function(Blueprint $table){
            $table->dropForeign('detail_enter_product_enter_product_id_foreign');
            $table->dropForeign('detail_enter_product_product_id_foreign');
            $table->dropForeign('enter_product_created_by_foreign');
            $table->dropForeign('enter_product_updated_by_foreign');
            $table->dropForeign('enter_product_deleted_by_foreign');
        });
        Schema::dropIfExists('detail_enter_product');
    }
}
