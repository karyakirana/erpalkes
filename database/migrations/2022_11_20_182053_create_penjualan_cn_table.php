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
        Schema::create('penjualan_cn', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash', 50);
            $table->string('kode', 20);
            $table->string('status', 20);
            $table->unsignedBigInteger('penjualan_id');
            $table->unsignedBigInteger('penerima_cn_id');
            $table->bigInteger('total_cn');
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
        Schema::dropIfExists('penjualan_cn');
    }
};
