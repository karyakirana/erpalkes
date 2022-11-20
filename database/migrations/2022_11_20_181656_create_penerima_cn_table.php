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
        Schema::create('penerima_cn', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->unsignedBigInteger('customer_id');
            $table->string('penerima_cn');
            $table->string('jabatan_cn')->nullable();
            $table->string('unit_cn')->nullable();
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
        Schema::dropIfExists('penerima_cn');
    }
};
