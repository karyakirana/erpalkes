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
        Schema::create('pembelian_retur_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembelian_retur_id');
            $table->unsignedBigInteger('stock_id');
            $table->bigInteger('harga_dasar');
            $table->bigInteger('jumlah');
            $table->float('diskon', 2);
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
        Schema::dropIfExists('pembelian_retur_detail');
    }
};
