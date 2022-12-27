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
        Schema::create('jurnal_transaksi_hpp', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash', 100);
            $table->unsignedBigInteger('jurnalable_transaksi_id')->nullable();
            $table->string('jurnalable_transaksi_type')->nullable();
            $table->unsignedBigInteger('akun_id');
            $table->bigInteger('debet')->nullable();
            $table->bigInteger('kredit')->nullable();
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
        Schema::dropIfExists('jurnal_transaksi_hpp');
    }
};
