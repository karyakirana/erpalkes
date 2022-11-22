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
        Schema::create('persediaan_keluar_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persediaan_keluar_id');
            $table->unsignedBigInteger('stock_id');
            $table->bigInteger('jumlah');
            $table->bigInteger('harga_dasar');
            $table->bigInteger('sub_total');
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
        Schema::dropIfExists('persediaan_keluar_detail');
    }
};
