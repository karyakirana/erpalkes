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
        Schema::create('persediaan', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('gudang_id');
            $table->date('tgl_produksi')->nullable();
            $table->date('tgl_expired')->nullable();
            $table->bigInteger('harga_dasar');
            $table->bigInteger('stock_awal')->nullable()->default(0);
            $table->bigInteger('stock_masuk')->nullable()->default(0);
            $table->bigInteger('stock_keluar')->nullable()->default(0);
            $table->bigInteger('stock_saldo')->nullable()->default(0);
            $table->bigInteger('stock_saldo_koreksi')->nullable()->default(0);
            $table->bigInteger('stock_saldo_lost')->nullable()->default(0);
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
        Schema::dropIfExists('persediaan');
    }
};
