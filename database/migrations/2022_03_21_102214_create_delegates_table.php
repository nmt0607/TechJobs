<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelegatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delegate', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000)->nullable()->comment('tên');
            $table->string('code',1000)->nullable()->comment('số phiếu');
            $table->string('phone', 20)->nullable()->comment('sdt');
            $table->string('email',255)->nullable()->comment('email');
            $table->string('position',255)->nullable()->comment('chức danh');
            $table->bigInteger('customer_id')->nullable()->comment('khách hàng');
            $table->text('note')->nullable()->comment('ghi chú');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delegate');
    }
}
