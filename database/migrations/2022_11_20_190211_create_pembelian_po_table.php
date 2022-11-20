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
        Schema::create('pembelian_po', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('user_id');
            $table->string('status_po');
            $table->bigInteger('total_barang');
            $table->bigInteger('total_bayar');
            $table->text('keterangan');
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
        Schema::dropIfExists('pembelian_po');
    }
};
