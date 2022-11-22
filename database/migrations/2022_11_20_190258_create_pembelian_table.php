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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->unsignedBigInteger('pembelian_po_id')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('user_id');
            $table->string('jenis_pembelian'); // tunai|tempo|dimuka
            $table->string('status_pembelian'); // belum|sebagian|lunas
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
        Schema::dropIfExists('pembelian');
    }
};
