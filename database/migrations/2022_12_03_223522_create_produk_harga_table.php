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
        Schema::create('produk_harga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('satuan_jual');
            $table->bigInteger('harga_beli'); // harga maksimal dari pembelian
            $table->integer('persen_margin', 3);
            $table->bigInteger('harga_margin');
            $table->bigInteger('harga_jual');
            $table->bigInteger('discount_maksimum');
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
        Schema::dropIfExists('produk_harga');
    }
};
