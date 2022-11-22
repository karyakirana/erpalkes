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
        Schema::create('persediaan_awal_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persediaan_awal_id');
            $table->unsignedBigInteger('produk_id');
            $table->boolean('is_expired');
            $table->date('tgl_produksi')->nullable();
            $table->date('tgl_expired')->nullable();
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
        Schema::dropIfExists('persediaan_awal_detail');
    }
};
