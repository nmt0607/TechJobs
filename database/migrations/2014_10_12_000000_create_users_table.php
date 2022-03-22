<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('account')->nullable()->comment('Họ tên');
            $table->string('phone')->nullable()->comment('Số điện thoại');
            $table->string('email')->nullable()->comment('email');
            $table->date('date')->nullable()->comment('Ngày sinh');
            $table->tinyInteger('sex')->nullable()->comment('Giới tính');
            $table->string('department')->nullable()->comment('Đơn vị');
            $table->string('password')->nullable()->comment('Mật khẩu');
            $table->bigInteger('category_id')->nullable()->comment('Category id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
