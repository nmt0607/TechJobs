<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_customer', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->nullable()->comment('Map với id của khách hàng');
            $table->bigInteger('survey_id')->nullable()->comment('Map với id của survey');
            $table->double('rate',19,2)->nullable()->comment('Thang điểm đánh giá');
            $table->string('content')->nullable()->comment('Mô tả sản phẩm');   
            $table->string('email')->nullable()->comment('Email khách hàng');   
            $table->string('phone')->nullable()->comment('SĐT khách hàng');   
            $table->string('customer_name')->nullable()->comment('Tên khách hàng');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_customer');
    }
}
