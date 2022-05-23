<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->tinyInteger('number')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('description')->nullable();
            $table->string('requirement')->nullable();
            $table->tinyInteger('level')->nullable();
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->string('benefit')->nullable();
            $table->string('type')->nullable();
            $table->bigInteger('address_id')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
