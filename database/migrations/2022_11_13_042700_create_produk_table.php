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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_sub_kategori_id');
            $table->string('kode', 10);
            $table->string('status', 20);
            $table->string('nama_produk', 100);
            $table->text('tipe');
            $table->string('merk', 50);
            $table->string('satuan_beli', 20);
            $table->string('satuan_jual', 20);
            $table->bigInteger('harga');
            $table->bigInteger('buffer_stock')->nullable()->default(0);
            $table->bigInteger('minimum_stock')->nullable()->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
