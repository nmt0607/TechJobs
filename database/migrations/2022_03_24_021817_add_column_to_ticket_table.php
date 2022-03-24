<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->string('content')->nullable()->comment('Nội dung');
            $table->string('sender')->nullable()->comment('Người gửi');
            $table->date('send_date')->nullable()->comment('Ngày gửi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->dropColumn('sender');
            $table->dropColumn('send_date');
        });
    }
}
