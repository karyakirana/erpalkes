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
        Schema::create('penjualan_cn_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penjualan_cn_id');
            $table->unsignedBigInteger('penjualan_detail_id_cn')->nullable();
            $table->float('nilai_persen_cn');
            $table->bigInteger('nilai_nominal_cn');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('penjualan_cn_detail');
    }
};
