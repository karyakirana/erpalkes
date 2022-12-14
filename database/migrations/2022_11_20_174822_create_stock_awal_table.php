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
        Schema::create('stock_awal', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash', 100);
            $table->string('kode', 20);
            $table->string('kondisi', 20);
            $table->unsignedBigInteger('gudang_id');
            $table->unsignedBigInteger('persediaan_awal_id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('total_barang');
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
        Schema::dropIfExists('stock_awal');
    }
};
