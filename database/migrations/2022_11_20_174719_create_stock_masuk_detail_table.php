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
        Schema::create('stock_masuk_detail_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_masuk_id');
            $table->unsignedBigInteger('produk_id');
            $table->date('tgl_produksi')->nullable();
            $table->date('tgl_expired')->nullable();
            $table->bigInteger('jumlah');
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
        Schema::dropIfExists('stock_masuk_detail_table');
    }
};
