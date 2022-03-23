<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Tên servey');
            $table->string('content')->nullable()->comment('Câu hỏi khảo sát');
            $table->smallInteger('type')->nullable()->comment('Loại survey');
            $table->bigInteger('admin_id')->nullable()->comment('Map với id của người quản trị');
            $table->double('rate',19,2)->nullable()->comment('Thang điểm đánh giá');
            $table->smallInteger('status')->nullable()->comment('Trạng thái');
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
        Schema::dropIfExists('survey');
    }
}
