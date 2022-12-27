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
        Schema::create('pengeluaran_pembelian_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengeluaran_pembelian_id');
            $table->unsignedBigInteger('pembelian_id');
            $table->string('status'); // lunas, sebagian
            $table->bigInteger('nominal_bayar');
            $table->bigInteger('sisa_bayar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluaran_pembelian_detail');
    }
};
