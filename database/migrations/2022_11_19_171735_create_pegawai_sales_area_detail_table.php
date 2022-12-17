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
        Schema::create('pegawai_sales_area_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_sales_area_id');
            $table->unsignedBigInteger('kota_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai_sales_area_detail');
    }
};
