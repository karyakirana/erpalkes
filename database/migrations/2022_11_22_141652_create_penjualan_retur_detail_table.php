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
        Schema::create('penjualan_retur_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penjualan_retur_id');
            $table->unsignedBigInteger('produk_id');
            $table->string('batch')->nullable();
            $table->date('tgl_expired')->nullable();
            $table->bigInteger('harga');
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
        Schema::dropIfExists('penjualan_retur_detail');
    }
};
