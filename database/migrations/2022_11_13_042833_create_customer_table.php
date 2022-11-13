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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('jenis_instansi');
            $table->string('area');
            $table->string('nama_customer');
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('npwp')->nullable();
            $table->text('alamat')->nullable();
            $table->double('diskon', 2)->nullable()->default(0);
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
        Schema::dropIfExists('customer');
    }
};
