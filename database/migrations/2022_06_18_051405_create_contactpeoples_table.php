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
        Schema::create('contactpeoples', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nom');
            $table->string('num');
            $table->string('tax_num_company');
            $table->foreign('tax_num_company')->references('tax_num')->on('profilcompanies');
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
        Schema::dropIfExists('contactpeoples');
    }
};
