<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->string('require)code')->nullable()->comment('Mã yêu cầu');
            $table->string('title')->nullable()->comment('Tiêu đề');
            $table->bigInteger('require_id')->nullable()->comment('Map với requirement');
            $table->bigInteger('customer_id')->nullable()->comment('Map với customer');
            $table->bigInteger('product_id')->nullable()->comment('Map với service product');
            $table->bigInteger('status_type')->nullable()->comment('Trạng thái');
            $table->bigInteger('priority_type')->nullable()->comment('Độ ưu tiên');
            $table->bigInteger('sla_id')->nullable()->comment('Map với SLA');
            $table->bigInteger('delegate_id')->nullable()->comment('Map với delegate');
            $table->bigInteger('type')->nullable();
            $table->bigInteger('user_category_id')->nullable()->comment('Map với user category');
            $table->bigInteger('user_id')->nullable()->comment('Map với user');
            $table->string('solution')->nullable()->comment('Giải pháp');
            $table->tinyInteger('rate')->nullable()->comment('Đánh giá');
            $table->string('feedback')->nullable()->comment('Phản hồi');
            $table->softDeletes();
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
        Schema::dropIfExists('ticket');
    }
}
