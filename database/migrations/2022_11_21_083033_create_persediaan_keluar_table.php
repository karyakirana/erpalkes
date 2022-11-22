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
        Schema::create('persediaan_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('persedianable_keluar_id');
            $table->string('persediaanable_keluar_type');
            $table->bigInteger('total_barang');
            $table->bigInteger('total_nominal');
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
        Schema::dropIfExists('persediaan_keluar');
    }
};
