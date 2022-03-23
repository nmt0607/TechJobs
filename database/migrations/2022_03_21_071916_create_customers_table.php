<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000)->nullable()->comment('Ten khach hang');
            $table->string('phone',1000)->nullable()->comment('So dien thoai');
            $table->string('email',1000)->nullable()->comment('Email');
            $table->bigInteger('delegate_id')->nullable()->comment('Người đại diện');
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
        Schema::dropIfExists('customer');
    }
}
