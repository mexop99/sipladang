<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('slug');
            $table->text('desc');
            $table->string('image');
            $table->integer('price')->default(0)->unsigned();
            $table->integer('stock')->default(0)->unsigned();
            $table->enum('status', ['PUBLISH', 'ARCHIVE']);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
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

        Schema::table('products', function(Blueprint $table){
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_created_by_foreign');
            $table->dropForeign('products_updated_by_foreign');
            $table->dropForeign('products_deleted_by_foreign');
        });

        Schema::dropIfExists('products');
    }
}
