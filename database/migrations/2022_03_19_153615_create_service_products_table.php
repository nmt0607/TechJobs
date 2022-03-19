<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_product', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Tên sản phẩm');
            $table->smallInteger('status')->nullable()->comment('Trạng thái');
            $table->bigInteger('category_id')->nullable()->comment('Map với id của danh mục sản phẩm');
            $table->double('rate',19,2)->nullable()->comment('Đánh giá');
            $table->string('description')->nullable()->comment('Mô tả sản phẩm');
            $table->bigInteger('user_id')->nullable()->comment('Người quản lý');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('service_product');
    }
}
