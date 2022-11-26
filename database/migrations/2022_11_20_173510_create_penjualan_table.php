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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->unsignedBigInteger('penjualan_quotation_id')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('sales_id')->nullable();
            $table->unsignedBigInteger('user_id'); // pembuat atau pengedit
            $table->string('jenis_penjualan'); // tunai|tempo|dimuka
            $table->string('status_invoice'); // belum|sebagian|lunas
            $table->date('tgl_nota');
            $table->date('tgl_tempo')->nullable();
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
        Schema::dropIfExists('penjualan');
    }
};
