<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilcompanies', function (Blueprint $table) {
            $table->string('tax_num')->primary();
            $table->unsignedBigInteger('id')->increments();
            $table->string('activity');
            $table->string('adress');
            $table->string('city');
            $table->string('fixline_num');
            $table->string('postcode');
            $table->string('country');
            $table->foreign('id')->references('id')->on('users');
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
        Schema::dropIfExists('profilcompanies');
    }
};
