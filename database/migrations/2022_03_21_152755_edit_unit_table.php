<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unit', function (Blueprint $table) {
            $table->renameColumn('province','province_id')->nullable()->comment('map voi ex_province_code');
            $table->renameColumn('district','district_id')->nullable()->comment('map voi ex_district_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('district_id');
        });
    }
}
