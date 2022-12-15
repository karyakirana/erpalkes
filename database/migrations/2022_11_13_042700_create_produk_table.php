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
            $table->string('kode');
            $table->string('nama_produk');
            $table->boolean('is_expired');
            $table->text('tipe');
            $table->string('merk', 50);
            $table->string('satuan_beli');
            $table->bigInteger('isi_kemasan');
            $table->string('satuan_jual');
            $table->bigInteger('harga');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('produk_image_id')->nullable();
            $table->unsignedBigInteger('produk_brosur_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('produk');
    }
};
