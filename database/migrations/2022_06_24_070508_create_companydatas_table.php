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
        Schema::create('companydatas', function (Blueprint $table) {
            $table->string('vat_number')->primary();
            $table->string('company_name')->nullable();
            $table->string('activity')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('nb_building')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country')->nullable();
            $table->string('fix_number')->nullable();
            $table->boolean('valid');
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
        Schema::dropIfExists('companydatas');
    }
};
