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
        Schema::create('penjualan_retur', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id'); // pembuat atau pengedit
            $table->string('status_penjualan_retur'); // belum|sebagian|lunas
            $table->date('tgl_nota');
            $table->bigInteger('total_barang');
            $table->bigInteger('total_ppn')->nullable();
            $table->bigInteger('total_biaya_lain')->nullable();
            $table->bigInteger('total_bayar');
            $table->text('keterangan')->nullable();
            $table->integer('print')->nullable();
            $table->softDeletes(); // softdeletes
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
        Schema::dropIfExists('penjualan_retur');
    }
};
